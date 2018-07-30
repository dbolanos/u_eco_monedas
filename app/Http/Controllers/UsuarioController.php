<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\CentroAcopio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    //
    public function getIndexUsuario(){
        //No retornara el usuario Administrador
        $usuarios = User::all()->except([1]);

        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function getCrearUsuario(){
        //Obtener todos los roles excepto el de cliente y administrador (Id = 3 y Id = 1)
        $roles          = Role::all()->except([1,3]);

        //Except el centro acopio general, que esta reservado para los cliente y el admin
        $centros_acopio = CentroAcopio::all()->except([1]);

        return view('admin.usuarios.create', ['roles'=>$roles,'centros_acopio' => $centros_acopio]);
    }

    public function crearUsuario(Request $request){
        //TODO Se debe de validar la informacion y verificar la contrasenna

        try{
        $usuario = new User();

        $usuario->name          = $request->name;
        $usuario->email         = $request->email;
        $usuario->password      = Hash::make($request->password);
        $centro_acopio          = CentroAcopio::find($request->centro_acopio);
        $usuario->centroAcopio()->associate($centro_acopio);

        $usuario->save();

        $usuario->roles()->attach($request->roles);

        $mensaje = ['tipo_mensaje' => 'success', 'msg' => 'Usuario creado satisfactoriamente: ' . $usuario->name ];

        return redirect()->route('usuario.index')->with('mensaje', $mensaje);

        }catch(\Exception $e){
            \Log::error('Problema con usuario: ' . $e->getMessage());
            $mensaje = ['tipo_mensaje' => 'danger', 'msg' => 'Error! Usuario no creado...'];

            return redirect()->route('usuario.index')->with('mensaje', $mensaje);
        }

    }

}
