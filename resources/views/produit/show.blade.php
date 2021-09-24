@extends('layouts.app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produits.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nom:</strong>
                {{ $produit->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>date:</strong>
                {{ $produit->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                 <img  id="img" name="img" src="{{ asset('img')}}/{{ $produit->photo }}"  alt="profile image" style="max-width:130px;margin-top: 20px">
              </div>
    </div>
@endsection