@extends('layouts.app')

@section('content')
  <div class="container" style="width:95%;">
    <hr class="my-4">

    <div class="row">
      <div class="col-md-5 justify-content-center">
        <img class="img-fluid" src="/storage/photo/{{$product->photo}}" alt="3243">
      </div>
      <div class="col-md-7">
    <div class="product ml-3">
    <h1><b>{{$product->name}}</b></h1>
    <hr class="my-4">
    <p><b>Opis:</b> {{$product->description}}</p>
    <p class="price-card"><b>Cijena:</b> {{$product->price}} KN</p>
    <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-dark">Dodaj u košaricu</a>
    </div>
      </div>
    </div>
    <div class="row">
    <div class="col">
      <a href="/product/{{$product->id}}/edit" class="btn btn-outline-secondary btn-md">Ažuriraj</a>
    </div>

    <div class="col">
      {!!Form::open(['action' => ['ProductController@destroy', $product->id], 'method' => 'POST', 'class' => 'float-right'])!!}
      {{Form::hidden('_method', 'DELETE')}}
      {{Form::submit('Obriši', ['class' => 'btn btn-danger float-right'])}}
      {!!Form::close()!!}
    </div>
    </div>
</div>
@endsection
