@extends('layouts.app')

@section('content')

  <div class="modal fade" id="addActeur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {{-- model add --}}
        <form method="post" action=""  enctype="multipart/form-data">
            <div class="modal-body">

                    @csrf
                    <div class="form-group">
                    <label for="">nom</label>
                    <input type="text" name="nom" id="nom" class="form-control"  placeholder="nom">
                    </div>
                    <div class="form-group">
                        <label for="">premon</label>
                        <input type="text" name="premon" id="premon" class="form-control"  placeholder="premon">
                        </div>
                    <div class="form-group">
                            <label for="">ville</label>
                            <input type="text" name="ville" id="ville" class="form-control"  placeholder="ville">
                    </div>
                   <div class="form-group">
                                <label for="">edition</label>
                                <input type="text" name="edition" id="edition" class="form-control"  placeholder="edition">
                    </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button  class="btn btn-primary" type="submit">Save changes</button>
            </div>
    </form>
      </div>
    </div>
  </div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>ajouter categori produit</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produits.create') }}"> ajouter</a>
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
            
            <th>nom</th>
            <th>description</th>
            <th>prix unitaire</th>
            <th>photo</th>
            <th>Categorie</th>
            

              
            <th width="350px">Action</th>
        </tr>
        @foreach ($produites as $produit)
        <tr>
            
            <td>{{ $produit->nom }}</td>
            
            <td>{{ $produit->description }}</td>
             <td>{{ $produit->prix_unitaire }}</td>
              <td>            
               <img src="{{ asset('img')}}/{{ $produit->photo }}" style="max-width:130px;margin-top: 20px" alt="">
                </td>
               <td>{{ $produit->categorie->nom}}</td>
            
             <td>
            
                <form action="/produit/destroy/{{$produit->id}}" method="POST">   
                    <a class="btn btn-info" href="/produit/show/{{$produit->id}}">Show</a>    
                    <a class="btn btn-primary" href="/produit/edit/{{$produit->id}}">Edit</a>   
                  
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addActeur" data->
                    command
                  </button>
        @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  

@endsection