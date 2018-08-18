<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Cliente;
use App\CentroAcopio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    //
    public function getIndexUsuario()
    {
        //Default filtro (Todos)
        $role_id = 0;
        $usuarios = User::paginate(5);
        //Tomar todos los roles excepto el de administrador
        $roles = Role::all()->except(1);

        return view('admin.usuarios.index', compact('usuarios','roles'));
    }

    public function filtroRolUsuario(Request $request){
        $role_id = $request->role_filtro;
        $roles = Role::all()->except(1);

        if($role_id != 0){
            //      $users = User::withRole('admin_centros_acopio')->get();
            $usuarios = User::whereHas('roles', function ($query) use($role_id){
                $query->where('id', $role_id);
            })->paginate(5);
        }
        else{
            $usuarios = User::paginate(5);
        }

        return view('admin.usuarios.index', compact('usuarios','roles', 'role_id'));
    }

    public function getCrearUsuario()
    {
        //Obtener todos los roles excepto el de cliente y administrador (Id = 3 y Id = 1)
        $roles = Role::all()->except([1, 3]);

        //Except el centro acopio general, que esta reservado para los cliente y el admin
        $centros_acopio = CentroAcopio::all()->except([1]);

        return view('admin.usuarios.create', ['roles' => $roles, 'centros_acopio' => $centros_acopio]);
    }

    public function crearUsuario(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|same:password_confirmation',
        ]);

        try {
            $usuario = new User();

            $usuario->name          = $request->name;
            $usuario->email         = $request->email;
            $usuario->password      = Hash::make($request->password);
            $centro_acopio          = CentroAcopio::find($request->centro_acopio);
            $usuario->centroAcopio()->associate($centro_acopio);

            $usuario->save();

            $usuario->roles()->attach($request->roles);

            $mensaje = ['tipo_mensaje' => 'success', 'msg' => 'Usuario creado satisfactoriamente: ' . $usuario->name];

            return redirect()->route('usuario.index')->with('mensaje', $mensaje);

        } catch (\Exception $e) {
            \Log::error('Error crearUsuario: ' . $e->getMessage());
            $mensaje = ['tipo_mensaje' => 'danger', 'msg' => 'Error! Usuario no creado...'];

            return redirect()->route('usuario.index')->with('mensaje', $mensaje);
        }

    }

    public function getUsuarioEditar($id)
    {
        $usuario = User::find($id);

        if($usuario->hasRole(['admin'])){
            $roles = Role::where('id',1)->get();
            $centros_acopio = CentroAcopio::where('id', 1)->get();
        }else if($usuario->hasRole(['cliente'])){
            $roles = Role::where('id',3)->get();
            $centros_acopio = CentroAcopio::where('id', 1)->get();
        }
        else{
            //Obtener todos los roles excepto el de cliente y administrador (Id = 3 y Id = 1)
            $roles = Role::all()->except([1, 3]);

            $centros_acopio = CentroAcopio::all()->except([1]);
        }

        return view('admin.usuarios.edit', ['usuario'=> $usuario, 'roles' => $roles, 'centros_acopio' => $centros_acopio]);
    }

    public function actualizarUsuario(Request $request)
    {
        try{
            $this->validate($request, [
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|email|max:255',
            ]);

            $usuario                    = User::find($request->id_usuario);
            $usuario->name              = $request->name;
            $usuario->email             = $request->email;
            $usuario->centro_acopio_id  = $request->centro_acopio;
            $usuario->roles()->sync($request->roles);
            $cliente = Cliente::where('user_id', $request->id_usuario)->first();
            if(!is_null($cliente)){
                $cliente->nombre_completo = $request->name;
                $cliente->correo          = $request->email;
                $cliente->save();
            }
            $mensaje                    = ['tipo_mensaje' => 'success', 'msg' => 'Usuario editado satisfactoriamente: ' . $usuario->name];

            if($request->cambio_contrasena == 'on'){
                if($request->password === $request->password_confirm && (!is_null($request->password) && $request->password != '') ){
                    $this->validate($request, [
                        'password'      => 'required|string|max:255|min:5'
                    ]);
                    $usuario->password  = Hash::make($request->password);
                }else{
                    $mensaje            = ['tipo_mensaje' => 'danger', 'msg' => 'Error, Por favor verifica la nueva contraseña'];
                }
            }

            $usuario->save();

            return redirect()->route('usuario.index')->with('mensaje', $mensaje);
        }catch(Exception $e){
            \Log::error('Error editando usuario. '. $e->getMessage());
            $mensaje            = ['tipo_mensaje' => 'danger', 'msg' => 'Error, Por favor verifica el usuario y la informacion ingresada'];
            return redirect()->route('usuario.index')->with('mensaje', $mensaje);
        }

    }


    public function cambiarContrasenaUsuario()
    {
        return view('admin.usuarios.cambio_contrasena');
    }

    public function contrasenaUsuario(Request $request)
    {
        $rules = array(
            'contrasena_actual'     => 'required',
            'nueva_contrasena'      => 'required|min:5',
            'confirmar_contrasena'  => 'required|same:nueva_contrasena'
        );

        $messages = array(
            'required'              => 'El campo :attribute es obligatorio.',
            'min'                   => 'El campo :attribute no puede tener menos de :min carácteres.'
        );

        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            return redirect()->route('cambiar_contrasena.usuario')->withErrors($validation)->withInput();
        } else {
            if (Hash::check($request->contrasena_actual, Auth::user()->password)) {
                $usuario            = User::find(Auth::id());
                $usuario->password  = Hash::make($request->nueva_contrasena);

                $usuario->save();

                if ($usuario->save()) {
                    $mensaje    = ['tipo_mensaje' => 'success', 'msg' => 'Cambio de Contraseña satisfactorio, ' . Auth::user()->name];
                    return redirect()->route('cambiar_contrasena.usuario')->with('mensaje', $mensaje);
                } else {
                    $mensaje    = ['tipo_mensaje' => 'danger', 'msg' => 'Error en cambio de contraseña. '];
                    return redirect()->route('cambiar_contrasena.usuario')->with('mensaje', $mensaje);
                }
            } else {
                $mensaje        = ['tipo_mensaje' => 'danger', 'msg' => 'La contraseña actual no es correcta'];
                return redirect()->route('cambiar_contrasena.usuario')->with('mensaje', $mensaje)->withInput();
            }
        }

    }



}
