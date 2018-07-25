<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //

    public function crearUsuario(){
        return view('auth.register');
    }

}
