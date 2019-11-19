@extends('product.admin')

@section('content')
  <div class="container-fluid mt-3">
    <div class="text-center">
      <h2 style="border-bottom: 1px solid black;">Dodaj proizvod</h2>
    </div>
    {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="form-group">
          {{Form::label('name', 'Naziv')}}
          {{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Upiši svoje ime i prezime...'])}}
        </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            {{Form::label('description', 'Opis')}}
            {{Form::text('description','', ['class' => 'form-control', 'placeholder' => 'Upiši svoju e-mail adresu..'])}}
          </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {{Form::label('price', 'Cijena')}}
              {{Form::text('price','', ['class' => 'form-control password', 'placeholder' => 'Ovdje upšite svoju lozinku...'])}}
            </div>
          </div>
            <div class="col-md-6">
              <div class="form-group mt-3">
              <div class="custom-file">
                {{Form::label('photo', 'Profilna slika', ['class' => 'custom-file-label', 'placeholder' => 'Izaberite sliku..'])}}
                {{Form::file('photo', ['class' => 'custom-file-input'])}}
              </div>
              </div>
            </div>

          </div>
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">

                  {{Form::label('category_id', 'Kategorija')}}
                  {{Form::select('category_id',$categories_data, ['class' => 'form-control password', 'placeholder' => 'Ovdje upšite svoju lozinku...'])}}

                </div>
              </div>
                <div class="col-md-6">

                </div>

              </div>
    <div class="row justify-content-center">
    {{Form::submit('Dodaj Proizvod', ['class' =>'btn btn-danger mt-5'])}}
    {!! Form::close() !!}
    </div>

  </div>

@endsection
