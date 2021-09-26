<?php

namespace App\Http\Controllers;

use App\Models\entrer;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $entreres = entrer::all()->where('active', true);

        return view('entrer.index', compact('entreres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mats= Material::all()->where('active', true);
        return view('entrer.create', compact('mats'));
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
             'quantite_entrer' => 'required',
             'prix' => 'required',
             'idMaterielle' => 'required',

         ]);


         $prix=$request->prix;
         $idMaterielle=$request->idMaterial;
        $quantite_entrer=$request->quantite_entrer;
        $total= $quantite_entrer*$prix;
           $user= Auth::user()->id;




        $entrer= new entrer();

            $entrer->quantite_entrer= $quantite_entrer;
        $entrer->prix=$prix;
          $entrer->date=now();
           $entrer->idMaterielle=$idMaterial;
            $entrer->prix_total=$total;
             $entrer->user_id=$user;
        $entrer->save();

        $materielle= Material::find($idMaterielle);
        $materielle->quantite=$materielle->quantite+$quantite_entrer;
        $materielle->save();

    //    entrer::create($request->all());

        return redirect()->route('entrers.index')
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
         $mats = Material::all()->where('active', true);
        $entrer= entrer::find($id);
        return view('entrer.show', compact('entrer', 'mats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrer= entrer::find($id);
        $mat= Material::find($entrer->idMaterielle);
        $mats = Material::all();
        return view('entrer.edit', compact('entrer', 'mat', 'mats'));
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
             'quantite_entrer' => 'required',
             'prix' => 'required',
             'idMaterielle' => 'required',

               ]);


         $prix=$request->prix;
         $idMaterielle=$request->idMaterial;
        $quantite_entrer=$request->quantite_entrer;
        $total= $quantite_entrer*$prix;
           $user= Auth::user()->id;



         $entrer= entrer::find($request->id);

            $entrer->quantite_entrer= $quantite_entrer;
        $entrer->prix=$prix;
           $entrer->idMaterielle=$idMaterial;
            $entrer->prix_total=$total;
             $entrer->user_id=$user;
        $entrer->save();


        return redirect()->route('entrers.index')
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
        $entrer= entrer::find($id);

        $entrer->delete();

        return redirect()->route('entrers.index')
                        ->with('success', 'Post deleted successfully');
    }
}
