@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>ajouter categori produit</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('categorie_materielles.create') }}"> ajouter</a>
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
            <th>description</th>
              
            <th width="280px">Action</th>
        </tr>
        @foreach ($categorie_materiellees as $categorie_materielle)
        <tr>
            
            <td>{{ $categorie_materielle->nom }}</td>
            
            <td>{{ $categorie_materielle->description }}</td>
             <td>
            
                <form action="/categorie_materielle/destroy/{{$categorie_materielle->id}}" method="POST">   
                    <a class="btn btn-info" href="/categorie_materielle/show/{{$categorie_materielle->id}}">Show</a>    
                    <a class="btn btn-primary" href="/categorie_materielle/edit/{{$categorie_materielle->id}}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  

@endsection