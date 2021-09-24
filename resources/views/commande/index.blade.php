@extends('layouts.app')

@section('content') 
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>ajouter une entre</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('commandes.create') }}"> ajouter</a>
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
            <th>numero de comande</th>
    
            <th>client</th>
             <th>liste produit</th>
           

            <th width="350px">Action</th>
        </tr>
        @foreach ($commandees as $commande)
        <tr>
            
            <td>{{ $commande->date }}</td>
            
            <td>{{ $commande->numero_bon_commande }}</td>

             
       
             <td>{{ $commande->Getclient->nom}}</td>
             <td>
             @if($commande->produit)
                    <ul>
                    @foreach($commande->produit as $pro)
                    <li>
                    {{$commande->GetproduitID($pro)->nom}} 
                     

                    </li>
                    @endforeach
                  @if($commande->dimention)
                     @foreach($commande->dimention as $dim) 
                         {{  $dim}}
                           @endforeach
                           @endif
                    </ul>
                @else
                vide
                    @endif
             </td>
            
             <td>
            
                <form action="/commande/destroy/{{$commande->id}}" method="POST">   
                    <a class="btn btn-info" href="/commande/show/{{$commande->id}}">Show</a>    
                    <a class="btn btn-primary" href="/commande/edit/{{$commande->id}}">Edit</a>   
                    <a class="btn btn-info" href="/commande/termine/{{$commande->id}}">termine</a>    
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  

@endsection