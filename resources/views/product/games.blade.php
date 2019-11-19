@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-2">
      <nav id="navbar-example3" class="navbar navbar-light bg-light">
    <nav class="nav nav-pills flex-column">
    <a class="btn text-secondary" href="/product/games"><h5 style="border-bottom:1px solid #0d47a1;">Video Igre</h5></a>
    <a class="nav-link text-secondary" href="/product/laptops"><h5 style="border-bottom:1px solid #007E33;">Laptopi</h5></a>
    <a class="nav-link text-secondary" href="/product/tv"><h5 style="border-bottom:1px solid #FF8800;">Televizori</h5></a>
    </nav>
    </nav>
    </div>
    <div class="col-md-10">
      <div data-spy="scroll" data-target="#navbar-example3" data-offset="0">
          <h4 id="item-1"><h3 style="border-bottom:1px solid #0d47a1;">Video Igre</h3></h4>
      <br>
          @if (count($products) > 0)
              <div class="row">
                  @foreach ($products as $product)
                    <div class="col-md-3">
                    <div class="card mb-3">
          <img class="card-img-top img-fluid" style="height:10rem;" src="/storage/photo/{{$product->photo}}" alt="Card image cap">
          <div class="card-body">
            <h6 class="card-title text-center">{{$product->name}}</h6>
            <p class="card-text text-center">{{$product->price}} KN</p>
            <div class="justify-content-center text-center">
              <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-dark btn-sm float-left">Dodaj u košaricu</a>
              <a href="/product/{{$product->id}}" class="btn btn-outline-dark btn-sm float-right">info</a>
            </div>

          </div>
        </div>
      </div>
                  @endforeach

              </div>
              {{$products->links()}}
          @else

              <p>Nema korisnika</p>
          @endif

    </div>

  </div>


</div>
</div>
@endsection
