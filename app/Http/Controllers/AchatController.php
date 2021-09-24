<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\achat;
use App\Models\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchatController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $achates = achat::all()->where('archive', false);

        return view('achat.index', compact('achates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prs= Command::all()->where('archive', false);
        $user= Auth::user()->id;
        return view('achat.create', compact('cls', 'prs'));
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
             'quantite_produit' => 'required',
             'date' => 'required',
             'prix_total' => 'required',
             'verse' => 'required',
             'reste' => 'required',
             'idUser' => 'required',
             'idCommand' => 'required',




         ]);



        $achat= new achat();

        $achat->numero_bon_achat=time();
          $achat->date=now();
            $achat->idProduit=$request->idProduit;
             $achat->idClient=$request->idClient;
             $achat->produit=$request->produit;

        $achat->save();



    //    achat::create($request->all());

        return redirect()->route('achats.index')
                        ->with('success', ' created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $mats = materielle::all()->where('archive', false);
        $achat= achat::find($id);
        return view('achat.show', compact('achat', 'mats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $achat= achat::find($id);
        $pr= produit::find($achat->idProduit);
        $prs = produit::all();
        $cl = client::find($achat->idProduit);
         $cls = client::all();

        return view('achat.edit', compact('achat', 'pr', 'prs', 'cl', 'cls'));
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


         $achat= achat::find($request->id);

        $achat->numero_bon_achat=time();
          $achat->date=now();
            $achat->idProduit=$request->idProduit;
             $achat->idClient=$request->idClient;
             // a verifier
                          $achat->produit=$request->produit;

        $achat->save();

        return redirect()->route('achats.index')
                        ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achat= achat::find($id);

        $achat->delete();

        return redirect()->route('achats.index')
                        ->with('success', 'Post deleted successfully');
    }

    public function termine($id)
    {
        $achat= achat::find($id);
        $achat->termine=1;
           $achat->save();
        return redirect()->route('achats.index')
                        ->with('success', 'termine');
    }
}
