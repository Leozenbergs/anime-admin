@extends('layout.default')
@section('titulo', 'Cadastro de animes')

@section('content')
<div class="container">
  <form action="{{route('admin.anime.insert')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    @include('layout._includes._form')
  </form>
</div>
@endsection
