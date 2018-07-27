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


    public function crearCliente(Request $request){
        //TODO Validar la informacion recibida con un Validator


        if($request->password == $request->password_confirmation){

            $cliente                    = new Cliente();
            $cliente->nombre_completo   = $request->name;
            $cliente->correo            = $request->email;
            $cliente->telefono          = $request->telefono;
            $cliente->direccion_exacta  = $request->direccion;

            $cliente->save();

            return redirect()->action('RegisterController@create',$request->request->all());


        }
        else{
            return 'Error, verifique la información';
        }

    }


}
