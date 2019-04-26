<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
// Metodo de autenticação de login
use Auth;

class LoginController extends Controller
{
  public function index(){
    return view('login.index');
  }

  public function register(){
    $user = new User;

    $user->name = Input::get('name');
    $user->email = Input::get('email');
    $user->password = bcrypt(Input::get('password'));
    $user->save();

    return redirect()->route('admin.anime.index');
  }

  public function enter(Request $req){
    $dados = $req->all();
    if(Auth::attempt(['email'=> $dados['email'], 'password' => Input::get('password')])){
      return redirect()->route('admin.anime.index');
    }
    redirect()->route('login');
  }

  public function logout(){
    Auth::logout();
    return redirect()->route('home');
  }
}
