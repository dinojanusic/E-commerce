@extends('product.admin')

@section('content')
<div class="container-fluid">
  @if (count($users) > 0)

    <table class="table table-hover table-condensed">
        <tr>
            <div class="row">
                <div class="col">
                    <h1>Korisnici</h1>
                </div>
                <hr class="my-4">
                <div class="col">
                </div>
            </div>

        </tr>
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Naziv</th>

            <th scope="col">Email</th>
            <th scope="col">Kategorija</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr class='clickable-row' data-href='/product/{{$user->id}}'>
                <th scope="row">{{$user->id}}</th>
                <td><a class="btn btn-md" href="/product/{{$user->id}}">{{$user->name}}</a>
                </td>
                <td>{{$user->email}}</td>
                <td></td>
            </tr>


        @endforeach
        </tbody>
    </table>
    {{$users->links()}}
  @else

      <p>Nema korisnika</p>
  @endif



</div>
@endsection
