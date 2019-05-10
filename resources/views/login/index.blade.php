@extends('layout.default')
@section('titulo', 'Home')
@section('content')
<div class="container text-center">
  <div class="row">
    {{-- Login --}}
    <div class="col login">
      <h3 class="text-center main_color">Login</h3>
      @if (Session::has('messageLogin'))
      <p class="alert alert-danger alert-dismissible">{!! Session::get('messageLogin') !!}</p>
      @endif
      <form class="form_login" action="{{route('login.enter')}}" method="post">
        {{csrf_field()}}
        <div class="form-group input_group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailDesc" placeholder="Enter your email">
          <small id="emailDesc" class="form-text text-muted">Enter your email</small>
        </div>
        <div class="form-group input_group">
          <label for="pwd">Password</label>
          <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter your password">
        </div>
        <button type="submit" class="btn main_button">Login</button>
      </form>
    </div>
    <hr class="form_division"/>
    {{-- Registrar user --}}
    <div class="col register">
      <h3 class="text-center main_color">Register</h3>
      @if (Session::has('messageRegisterSuccess'))
      <p class="alert alert-success alert-dismissible">{!! Session::get('messageRegisterSuccess') !!}</p>
      @endif
      @if (Session::has('messageRegister'))
      <p class="alert alert-danger alert-dismissible">{!! Session::get('messageRegister') !!}</p>
      @endif
      <form class="form_register" action="{{route('login.register')}}" method="post">
        {{csrf_field()}}
        <div class="form-group input_group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
        </div>
        <div class="form-group input_group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailDesc" placeholder="Enter your email">
          <small id="emailDesc" class="form-text text-muted">Enter your email</small>
        </div>
        <div class="form-group input_group">
          <label for="pwd">Password</label>
          <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter your password">
        </div>
        <button type="submit" class="btn main_button">Register</button>
      </form>
    </div>
  </div>

</div>
@endsection
