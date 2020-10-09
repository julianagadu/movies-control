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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile','UserController@profile');
Route::post('profile', 'UserController@updateAvatar');
Route::get('/logout','UserController@logout');


//Rotas de Categorias
Route::get('/categorias','CategoriaController@index')->name('listarCategorias');

Route::get('/categorias/create','CategoriaController@create');
Route::post('/categorias','CategoriaController@store');

Route::get('/categorias/{id}/edit','CategoriaController@edit');
Route::put('/categorias/{id}','CategoriaController@update');

Route::delete('/categorias/{id}','CategoriaController@destroy');


//Rotas de Filmes

Route::get('/categorias/{categoriaId}/filmes','FilmeController@index')->name('listarFilmes');

Route::get('/categorias/{categoriaId}/filmes/create','FilmeController@create');
Route::post('/categorias/{categoriaId}/filmes','FilmeController@store');

Route::get('/categorias/{categoriaId}/filmes/{id}/edit','FilmeController@edit');
Route::put('/categorias/{categoriaId}/filmes/{id}','FilmeController@update');

Route::delete('/categorias/{categoriaId}/filmes/{id}','FilmeController@destroy');
Route::get('/categorias/{categoriaId}/filmes/{id}/ver','FilmeController@detalhes');



