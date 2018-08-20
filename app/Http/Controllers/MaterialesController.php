<?php

namespace App\Http\Controllers;
use App\MaterialReciclable;
use App\Cliente;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MaterialesController extends Controller
{
  public function getIndex(){
    $materiales = MaterialReciclable::orderBy('nombre', 'asc')->get();
    return view('materiales.index',['materiales'=>$materiales]);
  }

  public function getAdminIndex(){
    $materiales = MaterialReciclable::orderBy('nombre', 'asc')->paginate(5);
    return view('admin.materiales.index',['materiales'=>$materiales]);
  }

  public function getAdminCreate(){
    return view('admin.materiales.create');
  }

  public function MaterialesAdminCreate( Request $request)
  {
    $this->validate($request, [
        'nombre' => 'required|min:5',
        'archivoImagen' => 'required|image',
        'valor' => 'required',
        'color' => 'required|unique:material_reciclables,color'
    ]);

    $ruta=$request->file('archivoImagen')->store('images','public');

    $material = new MaterialReciclable;
    $material->nombre = Input::get('nombre');
    $material->ruta_imagen = $ruta;
    $material->valor_ecomoneda = Input::get('valor');
    $material->color = Input::get('color');

    $material->save();
    return redirect()->route('materiales.index')->with('info', 'Material: ' . $request->input('nombre').' creado');
  }

  public function getAdminEdit( $id)
  {
    $material = MaterialReciclable::find($id);
    return view('admin.materiales.edit',['material' => $material]);
  }

  public function MaterialesAdminEdit( Request $request)
  {
    $this->validate($request, [
      'nombre' => 'required|min:5',
      'valor' => 'required',
      'color' => 'required|unique:material_reciclables,color' 

    ]);
      $material= MaterialReciclable::find($request->input('id'));
      if(($request->file('archivoImagen')!==null) || ($request->file('archivoImagen')!="")){
        Storage::disk('public')->delete($material->ruta_imagen);
        $ruta=$request->file('archivoImagen')->store('images','public');
        $material->ruta_imagen=$ruta;
      }
      $material->nombre = Input::get("nombre");
      $material->valor_ecomoneda = Input::get('valor');
      $material->color = Input::get('color');
      $material->save();
      return redirect()->route('materiales.index')->with('info', 'Material: ' . $request->input('nombre').' editado');
  }

  public function getMaterial(Request $request){
      try{
          return json_encode(MaterialReciclable::find($request->id_material));
      }catch(Exception $e){
          return json_encode('Error, No se encontro el material');
      }

  }

}
