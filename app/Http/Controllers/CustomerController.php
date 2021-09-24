<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clientes = client::all()->where('archive', false);

        return view('client.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('client.create');
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
               'prenom' => 'required',
               'telephone' => 'required',
               'adress' => 'required',

         ]);


        $nom=$request->nom;
         $prenom=$request->prenom;
         $telephone=$request->telephone;
        $adress=$request->adress;





        $client=  new client();
        $client->nom=$nom;
          $client->prenom=$prenom;
           $client->telephone=$telephone;
            $client->adress=$adress;

        $client->save();



    //    client::create($request->all());

        return redirect()->route('clients.index')
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

        $client= client::find($id);
        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client= client::find($id);

        return view('client.edit', compact('client'));
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
               'prenom' => 'required',
               'telephone' => 'required',
               'adress' => 'required',

         ]);



        $nom=$request->nom;
         $prenom=$request->prenom;
         $telephone=$request->telephone;
        $adress=$request->adress;





        $client= client::find($request->id);
        $client->nom=$nom;
          $client->prenom=$prenom;
           $client->telephone=$telephone;
            $client->adress=$adress;

        $client->save();

    //    client::create($request->all());

        return redirect()->route('clients.index')
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
        $client= client::find($id);

        $client->delete();

        return redirect()->route('clients.index')
                        ->with('success', 'Post deleted successfully');
    }
}
