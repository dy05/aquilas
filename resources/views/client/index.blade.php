@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>ajouter categori client</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('clients.create') }}"> ajouter</a>
        </div>
    </div>
</div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            
            <th>nom</th>
            <th>prenom</th>
            <th>telephone</th>
            <th>address</th>
            

              
            <th width="280px">Action</th>
        </tr>
        @foreach ($clientes as $client)
        <tr>
            
            <td>{{ $client->nom }}</td>
            
            <td>{{ $client->prenom }}</td>
             <td>{{ $client->telephone }}</td>
            
               <td>{{ $client->adress}}</td>
            
             <td>
            
                <form action="/client/destroy/{{$client->id}}" method="POST">   
                    <a class="btn btn-info" href="/client/show/{{$client->id}}">Show</a>    
                    <a class="btn btn-primary" href="/client/edit/{{$client->id}}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  

@endsection