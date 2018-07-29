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
    return view('ecomonedas.index');
})->name('eco.home');


Route::get('materiales', function () {
    return view('materiales.index');
})->name('eco.materiales');

Route::get('centros', function () {
    return view('centrosacopio.index');
})->name('eco.centros');

Route::get('acerca', function () {
    return view('otros.acerca-de');
})->name('eco.acerca');

Route::get('contactenos', function () {
    return view('otros.contactenos');
})->name('eco.contacto');


Route::group(['prefix' => 'usuario','middleware' => ['auth', 'permission:admin_usuarios']], function () {
    Route::get('registro',          ['as' => 'usuario.registro', 'uses'    => 'UsuarioController@crearUsuario']);
});

//Cliente

Route::get('cliente-registro',          ['as' => 'cliente.registro'     , 'uses'    => 'ClienteController@clienteRegistro']);
Route::post('crear-usuario',            ['as' => 'crear.usuario'        , 'uses'    => 'RegisterController@create']);

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
