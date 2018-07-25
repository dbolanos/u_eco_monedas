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
    return view('/ecomonedas/index');
})->name('eco.home');

//Route::group(['prefix' => 'usuario','middleware' => ['auth', 'permission:admin_usuarios']], function () {
//    Route::get('registro',          ['as' => 'usuario.registro', 'uses'    => 'UsuarioController@crearUsuario']);
//});

Route::get('registro',          ['as' => 'registro', 'uses'    => 'UsuarioController@crearUsuario']);

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
