@extends('layouts.app')

@section('content')




<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>comande</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('commandes.index') }}"> retour</a>
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

<form action="{{ route('commandes.store') }}" method="POST"enctype="multipart/form-data">
    @csrf

     <div class="row container ml-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product:</strong>
   <select name="product_id" class="form-select" aria-label="Disabled select example">
                <option selected ></option>
                @foreach ($prs as $mat )
                <option value="{{ $mat->id }}">{{ $mat->nom }}</option>
                @endforeach
              </select>            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nom clients:</strong>
   <select name="idClient" class="form-select" aria-label="Disabled select example">
                <option selected ></option>
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

            <img src="{{ asset('img')}}/{{ $mat->photo }}" style="max-width:130px;margin-top: 20px" alt="">
            <input type="checkbox" onclick="cli()" id="produit" name="produit[]"value="{{ $mat->id }}">{{ $mat->nom }}
                                                                                                                                                                                                                                                                                                                                                  )
            <input type="number" name="dimention[]">
            <p id="text" style="display:none"> yo
            </p>

                  @endforeach
            </fieldset>
             </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
<script>
function cli(){
    var cb=document.getElementById("produit");
var text=document.getElementById("text");
console.log(cb.checked==true)
if(cb.checked==true){
    text.style.display="block"
}
else{
    text.style.display="none"
}
}
</script>

@endsection
