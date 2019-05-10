@extends('layout.default')
@section('titulo', 'Animes')

@section('content')

<div id="main" class="container table text-center">
  <h3 class="main_color mt-2 mb-0 section-title">Anime List</h3>
  <hr class="section_divisor mb-4" />

  <table class="text-center" id="animes_table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Description</th>

      </tr>
    </thead>
    <tbody>
      @foreach($registros as $registro)
      <tr>
        <td class="center-align"><img height="60" src="{{asset($registro->imagem)}}" alt="{{$registro->titulo}}"></td>
        <td>{{$registro->titulo}}</td>
        <td>{{$registro->descricao}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>



@endsection
