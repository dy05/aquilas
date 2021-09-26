@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('commandes.index') }}"> Back</a>
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

    <form action="{{ route('commandes.update') }}" method="POST">
        @csrf
        @method('PUT')

                <input type="text" hidden name="id" value="{{ $commande->id }}" class="form-control" placeholder="Entre le id">

<div class="row container ml-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> nom Product:</strong>
   <select name="product_id" class="form-select" aria-label="Disabled select example">
                <option selectedvalue="{{ $pr->id }}">{{ $pr->nom}}</option>
                @foreach ($prs as $mat )
                <option value="{{ $mat->id }}">{{ $mat->nom }}</option>
                @endforeach
              </select>            </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nom client:</strong>
   <select name="idClient" class="form-select" aria-label="Disabled select example">
                <option selectedvalue="{{ $cl->id }}">{{ $cl->nom}}</option>
                @foreach ($cls as $mat )
                <option value="{{ $mat->id }}">{{ $mat->nom }} {{ $mat->prenom }}</option>
                @endforeach
              </select>            </div>
        </div>


 <div class="row">
            <div class="form-group">
            <fieldset>
            <label> liste des peoduit</label><p></p>
            @foreach ($prs as $mat )
            @foreach($commande->produit as $pro)

            @if($mat->id== $pro)
                    {{$commande->productID($pro)}}

            @else
            <div>
                <img src="{{ asset('img')}}/{{ $mat->photo }}" style="max-width:130px;margin-top: 20px" alt="">
            <input type="checkbox" name="produit[]"value="{{ $mat->id }}">{{ $mat->nom }}

            </div>
      @endif


           @endforeach
                  @endforeach
            </fieldset>
             </div>
        </div>




            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
