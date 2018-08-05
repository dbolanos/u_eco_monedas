<?php

namespace App\Http\Controllers;
use App\Cupon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CuponesController extends Controller
{
  public function getIndex(){
    $cupones = Cupon::orderBy('nombre','asc')->get();
    return view('cupones.index',['cupones'=>$cupones]);
  }

  public function getAdminIndex(){
    $cupones= Cupon::orderBy('nombre', 'asc')->get();
    return view('admin.cupones.index',['cupones'=>$cupones]);
  }

  public function getAdminCreate(){
    return view('admin.cupones.create');
  }

  public function CuponesAdminCreate( Request $request)
  {
    $this->validate($request, [
        'nombre' => 'required|min:5',
        'descripcion' => 'required|min:5',
        'cantidad' => 'required',
        'archivoImagen' => 'required|image'
    ]);

    $ruta=$request->file('archivoImagen')->store('images','public');

    $cupon = new Cupon;
    $cupon->nombre = Input::get('nombre');
    $cupon->descripcion = Input::get('descripcion');
    $cupon->ruta_imagen = $ruta;
    $cupon->cantidad_ecomonedas = Input::get('cantidad');

    $cupon->save();
    return redirect()->route('cupones.index')->with('info', 'Cupón: ' . $request->input('nombre').' creado');
  }

  public function getAdminEdit( $id)
  {
    $cupon = Cupon::find($id);
    return view('admin.cupones.edit',['cupones' => $cupon]);
  }

  public function CuponesAdminEdit( Request $request)
  {
    $this->validate($request, [
      'nombre' => 'required|min:5',
      'descripcion' => 'required|min:5',
      'cantidad' => 'required',
    ]);
      $cupon= Cupon::find($request->input('id'));
      if(($request->file('archivoImagen')!==null) || ($request->file('archivoImagen')!="")){
        Storage::disk('public')->delete($cupon->ruta_imagen);
        $ruta=$request->file('archivoImagen')->store('images','public');
        $cupon->ruta_imagen=$ruta;
      }
      $cupon->nombre = Input::get("nombre");
      $cupon->descripcion = Input::get('descripcion');
      $cupon->cantidad_ecomonedas = Input::get('cantidad');
      $cupon->save();
      return redirect()->route('cupones.index')->with('info', 'Cupón: ' . $request->input('nombre').' editado');
  }

}
