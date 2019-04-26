@extends('layout.default')
@section('titulo', 'Home')
@section('content')
  <div class="container text-center">
    <h2>Home</h2>
    <p>OLOKO BIXUU</p>
    <div class="row">
    @foreach ($dados as $dado)

      <div class="col-4 card">
        <div class="card_image">
          <img width="100%" height="250px" src="{{$dado->imagem}}" alt="">
        </div>
        <div class="card_descricao">
          <div class="card_title">
            <h3>{{$dado->titulo}}</h3>
          </div>
          <div class="card-descricao_content">
            <p>{{$dado->descricao}}</p>
          </div>
        </div>
      </div>


    @endforeach

    </div>
  </div>


@endsection
