<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;

class HomeController extends Controller
{
    public function index(){
      $dados = Anime::paginate(3);
      return view('home', compact('dados'));
    }

    
}
