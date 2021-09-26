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
            <h2>ajouter equipment</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('equipments.index') }}"> retour</a>
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

<form action="{{ route('equipments.store') }}" method="POST"enctype="multipart/form-data">
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
                <strong>color:</strong>
                <input type="text" name="color" class="form-control" placeholder="Entre la color">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>marque:</strong>
                <input type="text" name="marque" class="form-control" placeholder="Enter marque">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>date</strong>
                <input type="date" name="date" class="form-control" placeholder="Enter date">
            </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px"  name="detail" placeholder="Description"></textarea>

            </div>

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
