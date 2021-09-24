<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie_produit;

class CategorieProduitController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorie_produites = categorie_produit::all();

        return view('categorie_produit.index', compact('categorie_produites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorie_produit.create');
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
             'name' => 'required',


         ]);



         $nom=$request->nom;
         $description=$request->description;

        $categorie_produit= new categorie_produit();
        $categorie_produit->nom=$nom;
         $categorie_produit->description=$description;

        $categorie_produit->save();

    //    categorie_produit::create($request->all());

        return redirect()->route('categorie_produits.index')
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
        $categorie_produit= categorie_produit::find($id);
        return view('categorie_produit.show', compact('categorie_produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie_produit= categorie_produit::find($id);
        return view('categorie_produit.edit', compact('categorie_produit'));
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
               'name' => 'required',

         ]);

        $nom=$request->nom;
         $description=$request->description;

        $categorie_produit=categorie_produit::find($request->id);
        $categorie_produit->nom=$nom;
         $categorie_produit->description=$description;

        $categorie_produit->save();

    //    categorie_produit::create($request->all());

        return redirect()->route('categorie_produits.index')
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
        $categorie_produit= categorie_produit::find($id);

        $categorie_produit->delete();

        return redirect()->route('categorie_produits.index')
                        ->with('success', 'Post deleted successfully');
    }
}
