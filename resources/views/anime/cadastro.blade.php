@extends('layout.default')
@section('titulo', 'Anime Register')

@section('content')
<div class="container">
  @if (Session::has('message'))
  <p class="alert alert-danger alert-dismissible">{!! Session::get('message') !!}</p>
  @endif
  <form action="{{route('admin.anime.insert')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    @include('layout._includes._form')
  </form>
</div>
@endsection
