<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\CentroAcopio;
use App\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telefono' => 'required|string|max:8',
            'direccion' => 'required|string|min:6|max:250',
        ]);
    }

    /**
     * Create a new user for customers instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        //Este centro de acopio sera el default para cliente y el administrador
        $centro_acopio = 1;

        //Creacion del usuario para el cliente
        $user = User::create([
            'name'              => $data['name'],
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
            'centro_acopio_id'  => $centro_acopio,
        ]);


        $cliente                            = new Cliente();
        $cliente->nombre_completo           = $data['name'];
        $cliente->correo                    = $data['email'];
        $cliente->telefono                  = $data['telefono'];
        $cliente->direccion_exacta          = $data['direccion'];
        $cliente->eco_monedas_disponibles   = 0;
        $cliente->eco_monedas_gastadas      = 0;
        $cliente->user_id                   = $user->id;

        $cliente->save();

        $user->roles()->attach(3);

        //Se retorna el usuario para verificarlo y que automaticamente se logue
        return $user;
    }
}
