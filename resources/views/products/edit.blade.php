@extends('layouts.app')

@section('content')

<script>
        function previewFile() {
  var preview = document.querySelector('img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}
</script>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
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

    <form action="{{ route('products.update') }}" method="POST">
        @csrf
        @method('PUT')

                <input type="text" hidden name="id" value="{{ $produit->id }}" class="form-control" placeholder="Entre le id">

        <div class="row container ml-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" name="nom" value="{{ $produit->nom }}" class="form-control" placeholder="Entre le nom">
            </div>
        </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px"  name="description"  placeholder="Description">{{ $produit->description}}</textarea>

            </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prix_unitaire:</strong>
                <input type="number" value="{{$produit->prix_unitaire }}" name="prix_unitaire" class="form-control" >
            </div>
        </div>
            <select name="idCategorie" class="form-select" aria-label="Disabled select example">
                <option selected >{{$produit->prix_unitaire }}</option>
                @foreach ($cats as $cat )
                <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                @endforeach
              </select>
        </div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <label for=""></label>
                <input type="File" accept="image/*" name="photo"  class="form-control" class="form-control" onchange="previewFile()">
                <img  id="img" name="img" src="{{ asset('img')}}/{{ $produit->photo }}"  alt="profile image" style="max-width:130px;margin-top: 20px">
              </div>
         </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
