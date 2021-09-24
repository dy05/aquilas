<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\produit;
use App\Models\commande;
use App\Models\materielle;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $commandees = commande::all()->where('archive',false);
    
        return view('commande.index',compact('commandees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $prs= produit::all()->where('archive',false);
        $cls= client::all()->where('archive',false);
        return view('commande.create',compact('cls','prs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
             'produit' => 'required',
             'idClient' => 'required',
           
           
        ]);
    
            $tes=array_filter ($request->dimention, function($v){
                 return !is_null($v) && $v!=='';
            });
   
        $commande= new commande();
         
        $commande->numero_bon_commande=time(); 
          $commande->date=now();
            $commande->idProduit=$request->idProduit;
             $commande->idClient=$request->idClient;
             $commande->produit=$request->produit;
             $commande->dimention=$tes;
             
     $commande->save();

 

    //    commande::create($request->all());
     
        return redirect()->route('commandes.index')
                        ->with('success',' created successfully.');
    
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $mats = materielle::all()->where('archive',false);
        $commande= commande::find($id);
        return view('commande.show',compact('commande','mats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commande= commande::find($id);
        $pr= produit::find($commande->idProduit);
        $prs = produit::all();
        $cl = client::find($commande->idProduit);
         $cls = client::all();
         
        return view('commande.edit',compact('commande','pr', 'prs','cl', 'cls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

            $request->validate([
             'produit' => 'required',
             'idClient' => 'required',
           
           
        ]);

       
         $commande= commande::find($request->id);
         
        $commande->numero_bon_commande=time();
          $commande->date=now();
            $commande->idProduit=$request->idProduit;
             $commande->idClient=$request->idClient;
             // a verifier
                          $commande->produit=$request->produit;

     $commande->save();     
         
        return redirect()->route('commandes.index')
                        ->with('success','Post updated successfully');

  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commande= commande::find($id);

        $commande->delete();
    
        return redirect()->route('commandes.index')
                        ->with('success','Post deleted successfully');
    }

 public function termine($id)
    {
        $commande= commande::find($id);
        $commande->termine=1;
           $commande->save();     
        return redirect()->route('commandes.index')
                        ->with('success','termine');
    }
}
