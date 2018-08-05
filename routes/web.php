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

Route::group(['prefix'=>'admincentros','middleware' => ['auth', 'permission:centro_acopio']], function(){
  Route::get('', ['uses'=>'CentroAcopioController@getAdminIndex'])->name('centros.index');
  Route::get('create',['uses'=>'CentroAcopioController@getAdminCreate','as'=>'centros.create',]);
  Route::post('create',['uses' => 'CentroAcopioController@CentroAdminCreate','as' => 'centros.create',]);
  Route::get('edit/{id}',['uses'=>'CentroAcopioController@getAdminEdit','as'=>'centros.edit']);
  Route::post('edit', ['uses' => 'CentroAcopioController@CentroAdminEdit','as' => 'centros.update']);
});

Route::get('materiales', 'MaterialesController@getIndex')->name('eco.materiales');

Route::group(['prefix'=>'adminmateriales','middleware' => ['auth', 'permission:materiales_reciclables']], function(){
  Route::get('', ['uses'=>'MaterialesController@getAdminIndex'])->name('materiales.index');
  Route::get('create',['uses'=>'MaterialesController@getAdminCreate','as'=>'materiales.create',]);
  Route::post('create',['uses' => 'MaterialesController@MaterialesAdminCreate','as' => 'materiales.create',]);
  Route::get('edit/{id}',['uses'=>'MaterialesController@getAdminEdit','as'=>'materiales.edit']);
  Route::post('edit', ['uses' => 'MaterialesController@MaterialesAdminEdit','as' => 'materiales.update']);
});

Route::get('cupones', 'CuponesController@getIndex')->name('eco.cupones');

Route::group(['prefix'=>'admincupones','middleware' => ['auth', 'permission:cupones_canje']], function(){
  Route::get('', ['uses'=>'CuponesController@getAdminIndex'])->name('cupones.index');
  Route::get('create',['uses'=>'CuponesController@getAdminCreate','as'=>'cupones.create',]);
  Route::post('create',['uses' => 'CuponesController@CuponesAdminCreate','as' => 'cupones.create',]);
  Route::get('edit/{id}',['uses'=>'CuponesController@getAdminEdit','as'=>'cupones.edit']);
  Route::post('edit', ['uses' => 'CuponesController@CuponesAdminEdit','as' => 'cupones.update']);
});

Route::get('contactenos', function () {
    return view('otros.contactenos');
})->name('eco.contacto');

Route::get('admin', function () {
    return view('admin.index');
})->name('eco.admin');


//Admin Usuario
Route::group(['prefix' => 'usuario','middleware' => ['auth', 'permission:admin_usuarios']], function () {
    Route::get('index',             ['as' => 'usuario.index'            , 'uses'    => 'UsuarioController@getIndexUsuario']);
    Route::get('registro',          ['as' => 'usuario.registro'         , 'uses'    => 'UsuarioController@getCrearUsuario']);
    Route::post('crear',            ['as' => 'crear.usuario'            , 'uses'    => 'UsuarioController@crearUsuario']);
});

// Crear Usuario y Cliente
Route::get('cliente-registro',          ['as' => 'cliente.registro'     , 'uses'    => 'ClienteController@clienteRegistro']);


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
