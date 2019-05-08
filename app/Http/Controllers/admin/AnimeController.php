<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\Anime;

class AnimeController extends Controller
{
    public function index(){
      $registros = Anime::all();
      return view('anime.index', compact('registros'));
    }

    public function animes(){
      $registros = Anime::all();
      return view('animes', compact('registros'));
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
        // $nomeOrigImg = $imagem->getClientOriginalName();
        $num = rand(1111,9999);
        $diretorio = 'img/animes';
        $dir = 'https://s3-sa-east-1.amazonaws.com/anime-admin/teste'; //diretorio
        $ex =  $imagem->guessClientExtension(); // extenção
        $nomeImagem = "imagem_".$num.".".$ex;
        $imagem->move($diretorio, $nomeImagem); // move imagem para o diretorio
        $info['imagem'] = $dir."/".$nomeImagem;
        $fContent= $diretorio."/".$nomeImagem;
        // dd($info['imagem']);
        $diskCloud = Storage::disk('s3');
        // $diskCloud->registerStreamWrapper();
        $diskCloud->put('teste/'.$nomeImagem, file_get_contents($fContent));

        if($diskCloud->exists($nomeImagem)){
          return $diskCloud->files('teste');
        }
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
        // $nomeOrigImg = $imagem->getClientOriginalName();
        $num = rand(1111,9999);
        $diretorio = 'img/animes';
        $dir = 'https://s3-sa-east-1.amazonaws.com/anime-admin/teste'; //diretorio
        $ex =  $imagem->guessClientExtension(); // extenção
        $nomeImagem = "imagem_".$num.".".$ex;
        $imagem->move($diretorio, $nomeImagem); // move imagem para o diretorio
        $info['imagem'] = $dir."/".$nomeImagem;
        $fContent= $diretorio."/".$nomeImagem;
        // dd($info['imagem']);
        $diskCloud = Storage::disk('s3');
        // $diskCloud->registerStreamWrapper();
        $diskCloud->put('teste/'.$nomeImagem, file_get_contents($fContent));

        if($diskCloud->exists($nomeImagem)){
          return $diskCloud->files('teste');
        }
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
