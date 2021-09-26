<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Purchase;
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

        $achates = Purchase::all()->where('active', true);

        return view('achat.index', compact('achates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prs= Command::all()->where('active', true);
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
             'user_id' => 'required',
             'idCommand' => 'required',




         ]);



        $achat= new Purchase();

        $achat->numero_bon_achat=time();
          $achat->date=now();
            $achat->product_id=$request->product_id;
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
         $mats = materielle::all()->where('active', true);
        $achat= Purchase::find($id);
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
        $achat= Purchase::find($id);
        $pr= Product::find($achat->product_id);
        $prs = Product::all();
        $cl = client::find($achat->product_id);
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


         $achat= Purchase::find($request->id);

        $achat->numero_bon_achat=time();
          $achat->date=now();
            $achat->product_id=$request->product_id;
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
        $achat= Purchase::find($id);

        $achat->delete();

        return redirect()->route('achats.index')
                        ->with('success', 'Post deleted successfully');
    }

    public function termine($id)
    {
        $achat= Purchase::find($id);
        $achat->termine=1;
           $achat->save();
        return redirect()->route('achats.index')
                        ->with('success', 'termine');
    }
}
