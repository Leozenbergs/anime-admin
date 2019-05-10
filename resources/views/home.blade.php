@extends('layout.default')
@section('titulo', 'Home')
@section('content')
  <div class="container text-center">
    <h2 class="main_color mt-3">Main animes</h2>
    <hr class="section_divisor mb-4" />

    <div class="row">
    @foreach ($dados as $dado)

      <div class="col-12 col-sm-4 d-flex justify-content-center">
        <div class="card text-center">
          <div class="card_image">
            <img class="card_anime-image" src="{{$dado->imagem}}" alt="">
          </div>
          <div class="card_descricao">
            <div class="card_title my-2 main_color">
              <h3>{{$dado->titulo}}</h3>
            </div>
            <div class="card-descricao_content">
              <p>{{$dado->descricao}}</p>
            </div>
          </div>
        </div>

      </div>


    @endforeach

    </div>
  </div>


@endsection
