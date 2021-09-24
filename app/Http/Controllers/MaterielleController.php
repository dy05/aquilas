<?php

namespace App\Http\Controllers;

use App\Models\materielle;
use Illuminate\Http\Request;
use App\Models\categorie_materielle;

class MaterielleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $materiellees = materielle::all()->where('archive',false);
    
        return view('materielle.index',compact('materiellees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = categorie_materielle::all();
        return view('materielle.create',compact('cats'));
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
             'nom' => 'required',
             'couleur' => 'required',
             'dimension' => 'required',
             'idCategorie' => 'required',
             'quantite' => 'required',
        
           
        ]);
  
if($request->file('photo'))
{
 $photo=$request->file('photo');
    //  
        $photoName=time().'.'.$photo->extension();
        $photo->move(public_path('img'),$photoName);

      //  dd($photo);
  
         $nom=$request->nom;
         $couleur=$request->couleur;
         $dimension=$request->dimension;
        $idCategorie=$request->idCategorie;
        
        
        

       
        $materielle= new materielle();
          $quantite=$request->quantite;
            $materielle->quantite= $quantite;
        $materielle->nom=$nom;
          $materielle->idCategorie=$idCategorie;
           $materielle->couleur=$couleur;
            $materielle->dimension=$dimension;
             $materielle->photo=$photoName;
     $materielle->save();

    //    materielle::create($request->all());
     
        return redirect()->route('materielles.index')
                        ->with('success',' created successfully.');
    
}
else{
         $nom=$request->nom;
         $couleur=$request->couleur;
         $dimension=$request->dimension;
        $idCategorie=$request->idCategorie;
        
        
        

       
        $materielle= new materielle();
          $quantite=$request->quantite;
            $materielle->quantite= $quantite;
        $materielle->idCategorie=$idCategorie;
           $materielle->couleur=$couleur;
            $materielle->dimension=$dimension;
             $materielle->photo="a.png";
     $materielle->save();

    //    materielle::create($request->all());
     
        return redirect()->route('materielles.index')
                        ->with('success',' created successfully.');
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
         $cats = categorie_materielle::all();
        $materielle= materielle::find($id);
        return view('materielle.show',compact('materielle','cats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materielle= materielle::find($id);
        $cats = categorie_materielle::all();
        return view('materielle.edit',compact('materielle', 'cats'));
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
             'nom' => 'required',
             'couleur' => 'required',
             'dimension' => 'required',
             'idCategorie' => 'required',
             'quantite' => 'required',
         ]);
 
if($request->file('photo'))
{
 $photo=$request->file('photo');
    //  
        $photoName=time().'.'.$photo->extension();
        $photo->move(public_path('img'),$photoName);

      //  dd($photo);
   $nom=$request->nom;
         $couleur=$request->couleur;
         $dimension=$request->dimension;
        $idCategorie=$request->idCategorie;
        
         $quantite=$request->quantite;
            $materielle->quantite= $quantite;
       
        $materielle= materielle::find($request->id);
         $quantite=$request->quantite;
            $materielle->quantite= $quantite;
       $materielle->idCategorie=$idCategorie;
           $materielle->couleur=$couleur;
            $materielle->dimension=$dimension;
             $materielle->photo=$photoName;
     $materielle->save();

    //    materielle::create($request->all());
     
        return redirect()->route('materielles.index')
                        ->with('success','Post updated successfully');
    
}
else{
        $nom=$request->nom;
         $couleur=$request->couleur;
         $dimension=$request->dimension;
        $idCategorie=$request->idCategorie;
        
        

       
        $materielle= materielle::find($request->id);
          $quantite=$request->quantite;
            $materielle->quantite= $quantite;
        $materielle->idCategorie=$idCategorie;
           $materielle->couleur=$couleur;
            $materielle->dimension=$dimension;
            // $materielle->photo="a.png";
     $materielle->save();
    //    materielle::create($request->all());
     
        return redirect()->route('materielles.index')
                        ->with('success','Post updated successfully');
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
        $materielle= materielle::find($id);

        $materielle->delete();
    
        return redirect()->route('materielles.index')
                        ->with('success','Post deleted successfully');
    }
}
