@extends('layouts.app')

@section('content') 
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>ajouter categori materielle</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('materielles.create') }}"> ajouter</a>
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
            <th>couleur</th>
            <th>dimension</th>
            <th>quantite</th>
            <th>Categorie</th>
             <th>photo</th>

              
            <th width="280px">Action</th>
        </tr>
        @foreach ($materiellees as $materielle)
        <tr>
            
            <td>{{ $materielle->nom }}</td>
            
            <td>{{ $materielle->couleur }}</td>
             <td>{{ $materielle->dimension }}</td>
              <td>{{ $materielle->quantite }}</td>
             <td>{{ $materielle->GetCategorie->nom}}</td>

              <td>             
               <img src="{{ asset('img')}}/{{ $materielle->photo }}" style="max-width:130px;margin-top: 20px" alt="">
                           
                </td>
            
             <td>
            
                <form action="/materielle/destroy/{{$materielle->id}}" method="POST">   
                    <a class="btn btn-info" href="/materielle/show/{{$materielle->id}}">Show</a>    
                    <a class="btn btn-primary" href="/materielle/edit/{{$materielle->id}}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  

@endsection