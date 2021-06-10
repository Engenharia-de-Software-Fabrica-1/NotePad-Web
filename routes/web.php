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

//Route::get('/', 'SiteController@index')->name('site_index');
//Route::get('/', 'SiteController@cadastrar')->name('site_cadastrar');
Route::get('/', 'SiteController@cadastrar')->name('site_cadastrar');
Route::post('/', 'SiteController@create')->name('site_create');
/*
Route::get('/assinaturas/{id}', 'SiteController@assinaturas')->name('site_assinaturas');
Route::post('/cadastrar', 'SiteController@create')->name('site_create');*/




Route::get('/painel', function(){
    return redirect('/painel/home');
})->name('raiz');

Route::get('/painel/home', 'HomeController@index')->name('home');


//Usuários
Route::get('/painel/usuarios', 'usuarioController@index')->name('usuarios');
Route::post('/painel/usuarios/novo', 'usuarioController@store')->name('usuarios_store');
Route::get('/painel/usuarios/editar/{id}', 'usuarioController@edit')->name('usuarios_edit');
Route::post('/painel/usuarios/editar/{id}', 'usuarioController@save')->name('usuarios_save');
Route::post('/painel/usuarios/excluir/{id}', 'usuarioController@delete')->name('usuarios_delete');