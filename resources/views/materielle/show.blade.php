@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('materielles.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nom:</strong>
                {{ $materielle->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>date:</strong>
                {{ $materielle->color }}
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <img src="{{ asset('img')}}/{{ $materielle->photo }}" style="max-width:130px;margin-top: 20px" alt="">

            </div>
        </div>


    </div>
@endsection
