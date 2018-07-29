<?php

namespace App\Http\Controllers;

use App\Role;
use App\Cliente;
use App\CentroAcopio;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //


    public function clienteRegistro(){
        //Obtener todos los roles excepto el de cliente y administrador (Id = 3 y Id = 1)
        $roles          = Role::all()->except([1,3]);

        $centros_acopio = CentroAcopio::all();

        return view('auth.register', ['roles'=>$roles,'centros_acopio' => $centros_acopio]);
    }

}
