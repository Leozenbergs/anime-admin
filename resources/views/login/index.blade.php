@extends('layout.default')
@section('titulo', 'Home')
@section('content')
<div class="container text-center">
  <div class="row">
    {{-- Login --}}
    <div class="col-6 login">
      <h3 class="text-center">Login</h3>
      @if (Session::has('messageLogin'))
      <p class="alert alert-danger alert-dismissible">{!! Session::get('messageLogin') !!}</p>
      @endif
      <form class="" action="{{route('login.enter')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailDesc" placeholder="Enter your email">
          <small id="emailDesc" class="form-text text-muted">Enter your email</small>
        </div>
        <div class="form-group">
          <label for="pwd">Password</label>
          <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter your password">
        </div>
        <button type="submit" class="btn btn-primary">Enter</button>
      </form>
    </div>
    {{-- Registrar user --}}
    <div class="col-6">
      <h3 class="text-center">Register</h3>
      @if (Session::has('messageRegisterSuccess'))
      <p class="alert alert-success alert-dismissible">{!! Session::get('messageRegisterSuccess') !!}</p>
      @endif
      @if (Session::has('messageRegister'))
      <p class="alert alert-danger alert-dismissible">{!! Session::get('messageRegister') !!}</p>
      @endif
      <form class="" action="{{route('login.register')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailDesc" placeholder="Enter your email">
          <small id="emailDesc" class="form-text text-muted">Enter your email</small>
        </div>
        <div class="form-group">
          <label for="pwd">Password</label>
          <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter your password">
        </div>
        <button type="submit" class="btn btn-primary">Enter</button>
      </form>
    </div>
  </div>

</div>
@endsection
