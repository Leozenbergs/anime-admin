<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('titulo')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
  </head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Anime List </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile" aria-controls="mobile" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mobile">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
          </li>
          @if(Auth::guest())
            <li class="nav-item">
              <a class="nav-link" href="{{route('anime.index')}}">Animes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.anime.index')}}">Animes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.anime.register')}}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.anime.logout')}}">Logout</a>
          </li>
        @endif
        </ul>
      </div>
    </nav>
  </div>
