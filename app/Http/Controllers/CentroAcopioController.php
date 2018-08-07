<?php

namespace App\Http\Controllers;

use App\CentroAcopio;
use App\Provincias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CentroAcopioController extends Controller
{

  public function getIndex(){
    $centros = CentroAcopio::where('estado',true)->where('id','!=',1)->orderBy('provincia_id', 'asc')->paginate(4);
    return view('centrosacopio.index',['centros'=>$centros]);
  }

  public function getAdminIndex(){
    $centros = CentroAcopio::where('id', '!=', 1)->orderBy('provincia_id', 'asc')->get();
    return view('admin.centrosacopio.index',['centros'=>$centros]);
  }

  public function getAdminCreate(){
    $provincias = Provincias::all();
    return view('admin.centrosacopio.create',['provincias' => $provincias]);
  }

  public function CentroAdminCreate( Request $request)
  {
    $this->validate($request, [
        'nombre' => 'required|min:5',
        'direccion' => 'required|min:10',
        'telefono' => 'required|min:8',
    ]);
      $centroacopio= new CentroAcopio;
      $centroacopio->nombre = Input::get("nombre");
      $centroacopio->direccion_exacta = Input::get("direccion");
      $centroacopio->telefono = Input::get("telefono");
      $centroacopio->estado = Input::get("estado");
      $provincia= Provincias::find($request->input('provincias'));
      $centroacopio->provincia()->associate($provincia);
      $centroacopio->save();
      return redirect()->route('centros.index')->with('info', 'Centro Acopio: ' . $request->input('nombre').' creado');
  }

  public function getAdminEdit( $id)
  {
    $centroacopio = CentroAcopio::find($id);
    $provincias = Provincias::all();
    return view('admin.centrosacopio.edit',['centroacopio' => $centroacopio,'provincias' => $provincias]);
  }

  public function CentroAdminEdit( Request $request)
  {
    $this->validate($request, [
        'nombre' => 'required|min:5',
        'direccion' => 'required|min:10',
        'telefono' => 'required|min:8',
        'estado' => 'required'
    ]);
      $centroacopio= CentroAcopio::find($request->input('id'));
      $centroacopio->nombre = Input::get("nombre");
      $centroacopio->direccion_exacta = Input::get("direccion");
      $centroacopio->telefono = Input::get("telefono");
      $centroacopio->estado = Input::get("estado");
      $provincia= Provincias::find($request->input('provincias'));
      $centroacopio->provincia()->associate($provincia);
      $centroacopio->save();
      return redirect()->route('centros.index')->with('info', 'Centro Acopio: ' . $request->input('nombre').' editado');
  }

}
