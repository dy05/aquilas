<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use File;

class EquipementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $equipementes = Equipment::all();

        return view('equipement.index', compact('equipementes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipement.create');
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
         'date' => 'required',

         ]);

        if ($request->file('photo')) {
            $photo=$request->file('photo');
            //
                $photoName=time().'.'.$photo->extension();
                $photo->move(public_path('img'), $photoName);

              //  dd($photo);

                 $nom=$request->nom;
                 $color=$request->color;
                 $marque=$request->marque;
                 $date=$request->date;
                $detail=$request->detail;



                $equipement= new Equipment();
                $equipement->nom=$nom;
                 $equipement->color=$color;
                  $equipement->marque=$marque;
                   $equipement->date=$date;
            $equipement->detail=$detail;
             $equipement->photo=$photoName;
             $equipement->save();

            //    equipement::create($request->all());

                return redirect()->route('equipements.index')
                        ->with('success', ' created successfully.');
        } else {
                $nom=$request->nom;
                 $color=$request->color;
                 $marque=$request->marque;
                 $date=$request->date;
                $detail=$request->detail;



                $equipement= new Equipment();
                $equipement->nom=$nom;
                 $equipement->color=$color;
                  $equipement->marque=$marque;
                   $equipement->date=$date;
            $equipement->detail=$detail;
             $equipement->photo="a.png";
             $equipement->save();

            //    equipement::create($request->all());

                return redirect()->route('equipements.index')
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
        $equipement= Equipment::find($id);
        return view('equipement.show', compact('equipement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipement= Equipment::find($id);
        return view('equipement.edit', compact('equipement'));
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
         'date' => 'required',
         ]);

        if ($request->file('photo')) {
            $photo=$request->file('photo');
            //
                $photoName=time().'.'.$photo->extension();
                $photo->move(public_path('img'), $photoName);

              //  dd($photo);

                 $nom=$request->nom;
                 $color=$request->color;
                 $marque=$request->marque;
                 $date=$request->date;
                $detail=$request->detail;



                $equipement= Equipment::find($request->id);
                $equipement->nom=$nom;
                 $equipement->color=$color;
                  $equipement->marque=$marque;
                   $equipement->date=$date;
            $equipement->detail=$detail;
             $equipement->photo=$photoName;
             $equipement->save();

            //    equipement::create($request->all());

                return redirect()->route('equipements.index')
                        ->with('success', 'Post updated successfully');
        } else {
                $nom=$request->nom;
                 $color=$request->color;
                 $marque=$request->marque;
                 $date=$request->date;
                $detail=$request->detail;



                $equipement=  Equipment::find($request->id);
                $equipement->nom=$nom;
                 $equipement->color=$color;
                  $equipement->marque=$marque;
                   $equipement->date=$date;
            $equipement->detail=$detail;
                   //  $equipement->photo="a.png";
             $equipement->save();

            //    equipement::create($request->all());

                return redirect()->route('equipements.index')
                        ->with('success', 'Post updated successfully');
        }


    //      $nom=$request->nom;
    //      $color=$request->color;
    //      $marque=$request->marque;
    //      $date=$request->date;
    //         $detail=$request->detail;
    //            $photo=$request->photo;



    //     $equipement= equipement::find($request->id);
    //     $equipement->nom=$nom;
    //      $equipement->color=$color;
    //       $equipement->marque=$marque;
    //        $equipement->date=$date;
    //         $equipement->date=$detail;
    //          $equipement->date=$photo;
    //  $equipement->save();
    //    // $equipement->update($request->all());

    //     return redirect()->route('equipements.index')
    //                     ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipement= Equipment::find($id);

        $equipement->delete();

        return redirect()->route('equipements.index')
                        ->with('success', 'Post deleted successfully');
    }
}
