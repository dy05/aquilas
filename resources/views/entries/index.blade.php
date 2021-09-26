@extends('layouts.app')

@section('content') 
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>ajouter une entre</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('entrers.create') }}"> ajouter</a>
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
            
            <th>date</th>
            <th>quantite</th>
            <th>prix unitaire</th>
            <th>prix total</th>
            <th>materielle</th>
             <th>declancheur</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($entreres as $entrer)
        <tr>
            
            <td>{{ $entrer->date }}</td>
            
            <td>{{ $entrer->quantite_entrer }}</td>
             <td>{{ $entrer->prix }}</td>
              <td>{{ $entrer->prix_total }}</td>
             
             <td>{{ $entrer->GetMaterielle->nom}}</td>
             <td>{{ $entrer->Getuser->name}}</td>
            
             <td>
            
                <form action="/entrer/destroy/{{$entrer->id}}" method="POST">   
                    <a class="btn btn-info" href="/entrer/show/{{$entrer->id}}">Show</a>    
                    <a class="btn btn-primary" href="/entrer/edit/{{$entrer->id}}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  

@endsection