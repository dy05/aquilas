<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie_Material;

class CategorieMaterielleController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorie_materiellees = categorie_Material::all();

        return view('categorie_materielle.index', compact('categorie_materiellees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorie_materielle.create');
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

        $categorie_materielle= new categorie_materielle();
        $categorie_materielle->nom=$nom;
         $categorie_materielle->description=$description;

        $categorie_materielle->save();

    //    categorie_Material::create($request->all());

        return redirect()->route('categorie_materielles.index')
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
        $categorie_materielle= categorie_Material::find($id);
        return view('categorie_materielle.show', compact('categorie_materielle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie_materielle= categorie_Material::find($id);
        return view('categorie_materielle.edit', compact('categorie_materielle'));
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

        $categorie_materielle=categorie_Material::find($request->id);
        $categorie_materielle->nom=$nom;
         $categorie_materielle->description=$description;

        $categorie_materielle->save();

    //    categorie_Material::create($request->all());

        return redirect()->route('categorie_materielles.index')
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
        $categorie_materielle= categorie_Material::find($id);

        $categorie_materielle->delete();

        return redirect()->route('categorie_materielles.index')
                        ->with('success', 'Post deleted successfully');
    }
}
