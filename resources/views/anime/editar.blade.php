@extends('layout.default')
@section('titulo', 'Anime Edition')

@section('content')

<div class="container">
  @if (Session::has('message'))
  <p class="alert alert-danger alert-dismissible">{!! Session::get('message') !!}</p>
  @endif
  <h3 class="main_color mt-2 mb-0 section-title">Anime Edit</h3>
  <hr class="section_divisor mb-4 ml-0" />
  <form action="{{route('admin.anime.update', $registro->id)}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put">
    <div class="form-group">
      <label for="titulo">Title</label>
      <input type="text" name="titulo" class="form-control" id="titulo" aria-describedby="tituloDesc" placeholder="Title" value="{{$registro->titulo}}">
      <small id="tituloDesc" class="form-text text-muted">Title</small>
    </div>
    <div class="form-group">
      <label for="descricao">Description</label>
      <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Description" value="{{$registro->descricao}}">
    </div>
    <div class="form-check">
      <input type="file" name="imagem" class="form-check-input" id="animeImage">
      <label class="form-check-label" for="animeImage">Image</label>
    </div>
    <button type="submit" class="btn main_button my-4">Submit</button>
  </form>
</div>
@endsection
