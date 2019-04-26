<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Anime;

class AnimeController extends Controller
{
    public function index(){
      $registros = Anime::all();
      return view('anime.index', compact('registros'));
    }
    //

    public function register(){
      return view('anime.cadastro');
    }

    public function insert(Request $req){
      $info = $req->all();

      // tratamento de imagem
      if($req->hasFile('imagem')){//imagem = name
        $imagem = $req->file('imagem');
        $num = rand(1111,9999);
        $dir = 'img/animes'; //diretorio
        $ex =  $imagem->guessClientExtension(); // extenção
        $nomeImagem = "imagem_".$num.".".$ex;
        $imagem->move($dir, $nomeImagem); // move imagem para o diretorio
        $info['imagem'] = $dir."/".$nomeImagem;
      }else{
        \Session::flash('message', 'Fail, image required!');
        return false;
      }

      Anime::create($info);

      \Session::flash('message', 'Success!');

      return redirect()->route('admin.anime.index');
    }

    // Pagina de edição
    public function edit($id){
      $registro = Anime::find($id);
      return view('anime.editar', compact('registro'));
    }
    // Editar $dados
    public function update(Request $req, $id){
      $info = $req->all();


      // tratamento de imagem
      if($req->hasFile('imagem')){//imagem = name
        $imagem = $req->file('imagem');
        $num = rand(1111,9999);
        $dir = 'img/cursos'; //diretorio
        $ex =  $imagem->guessClientExtension(); // extenção
        $nomeImagem = "imagem_".$num.".".$ex;
        $imagem->move($dir, $nomeImagem); // move imagem para o diretorio
        $info['imagem'] = $dir."/".$nomeImagem;
      }else{
        \Session::flash('message', 'Fail, image required!');
        return false;
      }

      Anime::find($id)->update($info); // Procura no banco a row com o id e lança o update
      \Session::flash('message', 'Success!');
      return redirect()->route('admin.anime.index');
    }

    // Deletar $dados
    public function delete($id){
      Anime::find($id)->delete(); // Procura o dado com esse id e deleta da table IZI PIZI
      return redirect()->route('admin.anime.index');
    }
}
