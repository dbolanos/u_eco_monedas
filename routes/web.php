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

Route::get('centros', 'CentroAcopioController@getIndex')->name('eco.centros');

Route::group(['prefix'=>'admincentros'], function(){
  Route::get('', [
    'uses'=>'CentroAcopioController@getAdminIndex'
  ]
  )->name('centros.index');

  Route::get('create',
  [
    'uses'=>'CentroAcopioController@getAdminCreate',
    'as'=>'centros.create',
  ]);
  Route::post('create',
  [
    'uses' => 'CentroAcopioController@CentroAdminCreate',
    'as' => 'centros.create',
  ]
  );
  Route::get('edit/{id}',
  [
    'uses'=>'CentroAcopioController@getAdminEdit',
    'as'=>'centros.edit'
  ]
  );
  Route::post('edit', [
      'uses' => 'CentroAcopioController@CentroAdminEdit',
      'as' => 'centros.update'
  ]);

});

Route::get('materiales', function () {
    return view('materiales.index');
})->name('eco.materiales');

Route::get('contactenos', function () {
    return view('otros.contactenos');
})->name('eco.contacto');

Route::get('admin', function () {
    return view('admin.index');
})->name('eco.admin');

Route::group(['prefix' => 'usuario','middleware' => ['auth', 'permission:admin_usuarios']], function () {
    Route::get('registro',          ['as' => 'usuario.registro', 'uses'    => 'UsuarioController@crearUsuario']);
});

//Cliente

Route::get('cliente-registro',          ['as' => 'cliente.registro'     , 'uses'    => 'ClienteController@clienteRegistro']);
Route::post('crear-usuario',            ['as' => 'crear.usuario'        , 'uses'    => 'RegisterController@create']);

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
