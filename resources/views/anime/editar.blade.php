@extends('layout.default')
@section('titulo', 'Edição de animes')

@section('content')
<div class="container">
  <form action="{{route('admin.anime.update', $registro->id)}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put">
    <div class="form-group">
      <label for="titulo">Titulo</label>
      <input type="text" name="titulo" class="form-control" id="titulo" aria-describedby="tituloDesc" placeholder="Titulo" value="{{$registro->titulo}}">
      <small id="tituloDesc" class="form-text text-muted">Forneça um titulo</small>
    </div>
    <div class="form-group">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="{{$registro->descricao}}">
    </div>
    <div class="form-check">
      <input type="file" name="imagem" class="form-check-input" id="animeImage">
      <label class="form-check-label" for="animeImage">Imagem</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
