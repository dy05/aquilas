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
            <h2>ajouter materielle</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('materielles.index') }}"> retour</a>
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
   
<form action="{{ route('materielles.store') }}" method="POST"enctype="multipart/form-data">
    @csrf
  
     <div class="row container ml-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" name="nom" class="form-control" placeholder="Entre le nom">
            </div>
        </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>couleur:</strong>
                <textarea class="form-control" style="height:150px"  name="couleur" placeholder="couleur"></textarea>
              
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>dimension:</strong>
                <input type="text" name="dimension" class="form-control" >
            </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>quantite:</strong>
                <input type="number"  name="quantite" class="form-control" >
            </div>
        </div>
        </div>
            <select name="idCategorie" class="form-select" aria-label="Disabled select example">
                <option selected ></option>
                @foreach ($cats as $cat )
                <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                @endforeach
              </select>
        </div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <label for=""></label>
                <input type="File" accept="image/*" name="photo"  class="form-control" class="form-control" onchange="previewFile()">
                <img  id="img" name="img"  alt="profile image" style="max-width:130px;margin-top: 20px">
              </div>
         </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

@endsection
