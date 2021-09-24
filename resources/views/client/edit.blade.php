@extends('layouts.app')
   
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit client</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> il ya eu un ploblem<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('clients.update') }}" method="POST">
        @csrf
        @method('PUT')

                <input type="text" hidden name="id" value="{{ $client->id }}" class="form-control" placeholder="Entre le id">

        <div class="row container ml-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" name="nom" value="{{ $client->nom }}" class="form-control" placeholder="Entre le nom">
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prenom:</strong>
                <input type="text" name="prenom" value="{{ $client->prenom }}" class="form-control" placeholder="Entre le nom">
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>telephone:</strong>
                <input type="text" name="telephone" value="{{ $client->telephone }}" class="form-control" placeholder="Entre le nom">
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address:</strong>
                <input type="text" name="adress" value="{{ $client->adress }}" class="form-control" placeholder="Entre le nom">
            </div>
        </div>
      
        
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection