<?php

namespace App\Http\Controllers;

use App\Role;
use App\CentroAcopio;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //

    public function crearUsuario(){
        //Obtener todos los roles excepto el de cliente y administrador (Id = 3 y Id = 1)
        $roles          = Role::all()->except([1,3]);

        //Except el centro acopio general, que esta reservado para los cliente y el admin
        $centros_acopio = CentroAcopio::all()->except([1]);

        return view('admin.usuarios.create', ['roles'=>$roles,'centros_acopio' => $centros_acopio]);
    }

    public function adminCrearUsuario(Request $request){
        //Para crear un usuario se va a tener que utilizar este metodo ya que el otro intenta loguearse de una vez
        //pero como el que esta logueado es el admin da problemas
        dd($request);
    }

}
