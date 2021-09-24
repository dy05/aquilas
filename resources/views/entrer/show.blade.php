@extends('layouts.app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('entrers.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>quantire:</strong>
                {{ $entrer->quantite_entrer }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prix:</strong>
                {{ $entrer->prix }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prix:</strong>
                {{ $entrer->prix_total }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prix:</strong>
                {{ $entrer->GetMaterielle->nom}}
            </div>
        </div> 
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prix:</strong>
                {{ $entrer->Getuser->name }}
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <img src="{{ asset('img')}}/{{ $entrer->photo }}" style="max-width:130px;margin-top: 20px" alt="">

            </div>
        </div>
        
       
    </div>
@endsection