@extends('layout.default')
@section('titulo', 'Animes')

@section('content')

<div id="main" class="container table text-center">
  <h3 class=" section-title">Anime List</h3>
  
  <table class="text-center" id="animes_table">
    <thead>
      <tr>
        <th>Imagem</th>
        <th>Titulo</th>
        <th>Descricao</th>

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
