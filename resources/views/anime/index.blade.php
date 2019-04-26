@extends('layout.default')
@section('titulo', 'Animes')

@section('content')

<div id="main" class="container table text-center">
  <h3 class=" section-title">Lista de animes</h3>
  @if (Session::has('message'))
  <p class="alert alert-success alert-dismissible">{!! Session::get('message') !!}</p>
  @endif
  <table class="text-center" id="animes_table">
    <thead>
      <tr>
        <th>Titulo</th>
        <th>Descricao</th>
        <th>Imagem</th>
        <th>Acao</th>
      </tr>
    </thead>
    <tbody>
      @foreach($registros as $registro)
      <tr>
        <td>{{$registro->titulo}}</td>
        <td>{{$registro->descricao}}</td>
        <td class="center-align"><img height="60" src="{{asset($registro->imagem)}}" alt="{{$registro->titulo}}"></td>
        <td>
          <a class="btn" href="{{route('admin.anime.edit', $registro->id)}}">Editar</a>
          <a class="btn btn-danger" href="{{route('admin.anime.delete', $registro->id)}}">Deletar</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
<div class="text-center">
  <a class="btn btn-primary" href="{{route('admin.anime.register')}}">Adicionar</a>
</div>



@endsection
