@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('equipements.index') }}"> Back</a>
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

    <form action="{{ route('equipements.update') }}" method="POST">
        @csrf
        @method('PUT')

                <input type="text" hidden name="id" value="{{ $equipement->id }}" class="form-control" placeholder="Entre le id">

        <div class="row container ml-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" name="nom" value="{{ $equipement->nom }}" class="form-control" placeholder="Entre le nom">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>color:</strong>
                <input type="text" name="color" value="{{ $equipement->color }}" class="form-control" placeholder="Entre la color">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>marque:</strong>
                <input type="text" name="marque"  value="{{ $equipement->marque }}" class="form-control" placeholder="Enter marque">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>date:</strong>
                <input type="date" name="date"  value="{{ $equipement->date }}" class="form-control" placeholder="Enter date">
            </div>
        </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px"  name="detail"  placeholder="Description">{{ $equipement->detail}}</textarea>

            </div>

        </div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <label for=""></label>
                <input type="File" accept="image/*" name="photo"  class="form-control" value="{{$equipement->photo}}" class="form-control" onchange="previewFile()">
                <img  id="img" name="img" src="{{ asset('img')}}/{{ $equipement->photo }}"  alt="profile image" style="max-width:130px;margin-top: 20px">
              </div>

         </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
