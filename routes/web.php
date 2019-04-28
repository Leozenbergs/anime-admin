<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', ['as'=>'home', 'uses'=>'HomeController@index']);

Route::get('/admin/anime/register',  ['as'=>'admin.anime.register', 'uses' => 'admin\AnimeController@register']);

Route::get('/login', ['as'=>'login', 'uses' => 'LoginController@index']);
Route::post('/enter', ['as'=>'login.enter', 'uses'=>'LoginController@enter']);
Route::post('/register', ['as'=>'login.register', 'uses'=>'LoginController@register']);

Route::get('/logout', ['as'=>'admin.anime.logout', 'uses'=>'LoginController@logout']);
Route::get('/animes', ['as'=>'anime.index', 'uses'=>'admin\AnimeController@animes']);
// cadastro de animes
Route::group(['middleware'=>'auth'], function(){

  Route::get('/admin/animes', ['as'=>'admin.anime.index', 'uses'=>'admin\AnimeController@index']);
  Route::post('/admin/anime/insert',  ['as'=>'admin.anime.insert', 'uses' => 'admin\AnimeController@insert']);

  Route::get('/admin/anime/edit/{id}',['as'=> 'admin.anime.edit', 'uses'=>'admin\AnimeController@edit']);
  Route::put('/admin/anime/update/{id}',['as'=> 'admin.anime.update', 'uses'=>'admin\AnimeController@update']);
  Route::get('/admin/anime/delete/{id}',['as'=> 'admin.anime.delete', 'uses'=>'admin\AnimeController@delete']);
});
