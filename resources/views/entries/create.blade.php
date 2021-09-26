@extends('layouts.app')

@section('content')




<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>entre en stock</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('entrers.index') }}"> retour</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> il a eu un problem.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('entrers.store') }}" method="POST"enctype="multipart/form-data">
    @csrf
  
     <div class="row container ml-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>quantite:</strong>
                <input type="number" name="quantite_entrer" class="form-control">
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prix:</strong>
                <input type="number" name="prix" class="form-control">
            </div>
        </div>


               <select name="idMaterielle" class="form-select" aria-label="Disabled select example">
                <option selected ></option>
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
