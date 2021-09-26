@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('commandes.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>date:</strong>
               {{ $commande->date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>numero:</strong>
               {{ $commande->numero_bon_commande }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prix:</strong>
                {{ $commande->Getclient->nom}}
            </div>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prix:</strong>
               {{ $commande->product->nom}}
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <img src="{{ asset('img')}}/{{ $commande->product->photo }}" style="max-width:130px;margin-top: 20px" alt="">

            </div>
        </div>
            <td>
             @if($commande->produit)
                    <ul>
                    @foreach($commande->produit as $pro)
                    <li>
                    {{$pro}}
                    </li>
                    @endforeach
                    </ul>
                @else
                vide
                    @endif

             </td>


    </div>
@endsection
