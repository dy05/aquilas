<?php

namespace App\Http\Controllers;

use App\Models\produit;
use Illuminate\Http\Request;
use App\Models\categorie_produit;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produites = produit::all()->where('active', true);

        return view('produit.index', compact('produites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = categorie_produit::all();
        return view('produit.create', compact('cats'));
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
         'prix_unitaire'=> 'required',
         'photo'=> 'required',

         ]);

        if ($request->file('photo')) {
            $photo=$request->file('photo');
            //
                $photoName=time().'.'.$photo->extension();
                $photo->move(public_path('img'), $photoName);

              //  dd($photo);

                 $nom=$request->nom;
                 $description=$request->description;
                 $prix_unitaire=$request->prix_unitaire;
                $idCategorie=$request->idCategorie;





                $produit= new produit();
                $produit->nom=$nom;
                  $produit->idCategorie=$idCategorie;
                   $produit->description=$description;
            $produit->prix_unitaire=$prix_unitaire;
             $produit->photo=$photoName;
             $produit->save();

            //    produit::create($request->all());

                return redirect()->route('produits.index')
                        ->with('success', ' created successfully.');
        } else {
                 $nom=$request->nom;
                 $description=$request->description;
                 $prix_unitaire=$request->prix_unitaire;
                $idCategorie=$request->idCategorie;





                $produit= new produit();
                $produit->nom=$nom;
                  $produit->idCategorie=$idCategorie;
                   $produit->description=$description;
            $produit->prix_unitaire=$prix_unitaire;
             $produit->photo="a.png";
             $produit->save();

            //    produit::create($request->all());

                return redirect()->route('produits.index')
                        ->with('success', ' created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $cats = categorie_produit::all();
        $produit= produit::find($id);
        return view('produit.show', compact('produit', 'cats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit= produit::find($id);
        $cats = categorie_produit::all();
        return view('produit.edit', compact('produit', 'cats'));
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

        if ($request->file('photo')) {
            $photo=$request->file('photo');
            //
                $photoName=time().'.'.$photo->extension();
                $photo->move(public_path('img'), $photoName);

              //  dd($photo);

                $nom=$request->nom;
                 $description=$request->description;
                 $prix_unitaire=$request->prix_unitaire;
                $idCategorie=$request->idCategorie;





                $produit= produit::find($request->id);
                $produit->nom=$nom;
                  $produit->idCategorie=$idCategorie;
                   $produit->description=$description;
            $produit->prix_unitaire=$prix_unitaire;
             $produit->photo=$photoName;
             $produit->save();

            //    produit::create($request->all());

                return redirect()->route('produits.index')
                        ->with('success', 'Post updated successfully');
        } else {
                $nom=$request->nom;
                 $description=$request->description;
                 $prix_unitaire=$request->prix_unitaire;
                $idCategorie=$request->idCategorie;





                $produit= produit::find($request->id);
                $produit->nom=$nom;
                  $produit->idCategorie=$idCategorie;
                   $produit->description=$description;
            $produit->prix_unitaire=$prix_unitaire;
                   //  $produit->photo="a.png";
             $produit->save();
            //    produit::create($request->all());

                return redirect()->route('produits.index')
                        ->with('success', 'Post updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit= produit::find($id);

        $produit->delete();

        return redirect()->route('produits.index')
                        ->with('success', 'Post deleted successfully');
    }
}
