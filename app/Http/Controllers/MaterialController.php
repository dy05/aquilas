<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\categorie_Material;

class MaterialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $materiellees = Material::all()->where('active', true);

        return view('materielle.index', compact('materiellees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = categorie_Material::all();
        return view('materielle.create', compact('cats'));
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
             'color' => 'required',
             'dimension' => 'required',
             'idCategorie' => 'required',
             'quantite' => 'required',


         ]);

        if ($request->file('photo')) {
            $photo=$request->file('photo');
            //
                $photoName=time().'.'.$photo->extension();
                $photo->move(public_path('img'), $photoName);

              //  dd($photo);

                 $nom=$request->nom;
                 $color=$request->color;
                 $dimension=$request->dimension;
                $idCategorie=$request->idCategorie;





                $materielle= new materielle();
                  $quantite=$request->quantite;
            $materielle->quantite= $quantite;
                $materielle->nom=$nom;
                  $materielle->idCategorie=$idCategorie;
                   $materielle->color=$color;
            $materielle->dimension=$dimension;
             $materielle->photo=$photoName;
             $materielle->save();

            //    Material::create($request->all());

                return redirect()->route('materielles.index')
                        ->with('success', ' created successfully.');
        } else {
                 $nom=$request->nom;
                 $color=$request->color;
                 $dimension=$request->dimension;
                $idCategorie=$request->idCategorie;





                $materielle= new materielle();
                  $quantite=$request->quantite;
            $materielle->quantite= $quantite;
                $materielle->idCategorie=$idCategorie;
                   $materielle->color=$color;
            $materielle->dimension=$dimension;
             $materielle->photo="a.png";
             $materielle->save();

            //    Material::create($request->all());

                return redirect()->route('materielles.index')
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
         $cats = categorie_Material::all();
        $materielle= Material::find($id);
        return view('materielle.show', compact('materielle', 'cats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materielle= Material::find($id);
        $cats = categorie_Material::all();
        return view('materielle.edit', compact('materielle', 'cats'));
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
             'color' => 'required',
             'dimension' => 'required',
             'idCategorie' => 'required',
             'quantite' => 'required',
         ]);

        if ($request->file('photo')) {
            $photo=$request->file('photo');
            //
                $photoName=time().'.'.$photo->extension();
                $photo->move(public_path('img'), $photoName);

              //  dd($photo);
            $nom=$request->nom;
                 $color=$request->color;
                 $dimension=$request->dimension;
                $idCategorie=$request->idCategorie;

                 $quantite=$request->quantite;
            $materielle->quantite= $quantite;

                $materielle= Material::find($request->id);
                 $quantite=$request->quantite;
            $materielle->quantite= $quantite;
               $materielle->idCategorie=$idCategorie;
                   $materielle->color=$color;
            $materielle->dimension=$dimension;
             $materielle->photo=$photoName;
             $materielle->save();

            //    Material::create($request->all());

                return redirect()->route('materielles.index')
                        ->with('success', 'Post updated successfully');
        } else {
                $nom=$request->nom;
                 $color=$request->color;
                 $dimension=$request->dimension;
                $idCategorie=$request->idCategorie;




                $materielle= Material::find($request->id);
                  $quantite=$request->quantite;
            $materielle->quantite= $quantite;
                $materielle->idCategorie=$idCategorie;
                   $materielle->color=$color;
            $materielle->dimension=$dimension;
            // $materielle->photo="a.png";
             $materielle->save();
            //    Material::create($request->all());

                return redirect()->route('materielles.index')
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
        $materielle= Material::find($id);

        $materielle->delete();

        return redirect()->route('materielles.index')
                        ->with('success', 'Post deleted successfully');
    }
}
