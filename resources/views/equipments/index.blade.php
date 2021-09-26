@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>ajouter equipment</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('equipments.create') }}"> ajouter</a>
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
            <th>No</th>
            <th>nom</th>
            <th>colour</th>
            <th>marque</th>
            <th>description</th>
              <th>image</th>
                <th>date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($equipments as $equipment)
        <tr>
            <td>{{$equipment->id }}</td>
            <td>{{ $equipment->nom }}</td>
            <td>{{ $equipment->color  }}</td>
            <td>{{ $equipment->marque }}</td>
            <td>{{ $equipment->detail }}</td>
             <td>
             <img src="{{ asset('img')}}/{{ $equipment->photo }}" style="max-width:130px;margin-top: 20px" alt="">
             </td>
              <td>{{ $equipment->date }}</td>
            <!-- <td> \Str::limit($value->description, 100) </td> -->
            <td>
                <form action="/equipment/destroy/{{$equipment->id}}" method="POST">
                    <a class="btn btn-info" href="/equipment/show/{{$equipment->id}}">Show</a>
                    <a class="btn btn-primary" href="/equipment/edit/{{$equipment->id}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
