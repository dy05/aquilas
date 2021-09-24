@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>ajouter equipement</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('equipements.create') }}"> ajouter</a>
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
            <th>No</th>
            <th>nom</th>
            <th>colour</th>
            <th>marque</th>
            <th>description</th>
              <th>image</th>
                <th>date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($equipementes as $equipement)
        <tr>
            <td>{{$equipement->id }}</td>
            <td>{{ $equipement->nom }}</td>
            <td>{{ $equipement->couleur  }}</td>
            <td>{{ $equipement->marque }}</td>
            <td>{{ $equipement->detail }}</td>
             <td>
             <img src="{{ asset('img')}}/{{ $equipement->photo }}" style="max-width:130px;margin-top: 20px" alt="">
             </td>
              <td>{{ $equipement->date }}</td>
            <!-- <td> \Str::limit($value->description, 100) </td> -->
            <td>
                <form action="/equipement/destroy/{{$equipement->id}}" method="POST">   
                    <a class="btn btn-info" href="/equipement/show/{{$equipement->id}}">Show</a>    
                    <a class="btn btn-primary" href="/equipement/edit/{{$equipement->id}}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  

@endsection