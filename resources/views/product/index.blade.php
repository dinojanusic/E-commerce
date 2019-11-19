@extends('product.admin')

@section('content')
<div class="container-fluid">
  @if (count($products) > 0)

    <table class="table table-hover table-condensed">
        <tr>
            <div class="row">
                <div class="col">
                    <h1>Proizvodi</h1>
                </div>
                <hr class="my-4">
                <div class="col">
                    <a href="/product/create" class="btn btn-outline-secondary btn-sm float-right"><i
                            class="fas fa-plus-circle"></i> Dodaj proizvod</a>
                </div>
            </div>

        </tr>
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Naziv</th>

            <th scope="col">Kategorija</th>
            <th scope="col">----</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr class='clickable-row' data-href='/product/{{$product->id}}'>
                <th scope="row">{{$product->id}}</th>
                <td><a class="btn btn-md" href="/product/{{$product->id}}">{{$product->name}}</a>
                </td>
                <td class="text-center">{{$product->category->name}}</td>
                <td><a href="/product/{{$product->id}}/edit" class="btn btn-outline-secondary btn-sm float-right ml-1">Ažuriraj</a>
                   {!!Form::open(['action' => ['ProductController@destroy', $product->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Obriši', ['class' => 'btn btn-danger btn-sm float-right'])}}
                  {!!Form::close()!!}</td>
            </tr>


        @endforeach
        </tbody>
    </table>
    {{$products->links()}}
  @else

      <p>Nema korisnika</p>
  @endif



</div>
@endsection
