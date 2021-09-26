@extends('layouts.app')
   
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('entrers.index') }}"> Back</a>
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
  
    <form action="{{ route('entrers.update') }}" method="POST">
        @csrf
        @method('PUT')

                <input type="text" hidden name="id" value="{{ $entrer->id }}" class="form-control" placeholder="Entre le id">

        <div class="row container ml-5">
       
       <div class="row container ml-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>quantite:</strong>
                <input type="number" value="{{ $entrer->quantite_entrer}}" name="quantite_entrer" class="form-control">
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prix:</strong>
                <input type="number" value="{{ $entrer->prix}}" name="prix" class="form-control">
            </div>
        </div>



               <select name="idMaterielle" class="form-select" aria-label="Disabled select example">
                <option selected value="{{ $mat->id }}">{{ $mat->nom}}</option>
                @foreach ($mats as $mat )
                <option value="{{ $mat->id }}">{{ $mat->nom }}</option>
                @endforeach
              </select>
   
        
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection