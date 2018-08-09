@extends('layouts.master')
@section('titulo','Registro Usuario')
@section('contenido')
</br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Registro Usuario</h2></div>
                <br>
                {{--<form method="POST" action="{{ route('crear.cliente') }}" aria-label="{{ __('Register') }}">--}}
                <form method="POST" action="{{ route('crear.usuario') }}" aria-label="{{ __('Register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" style="color:black" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" style="border: 2px solid #555" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" style="color:black" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" style="border: 2px solid #555" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" style="color:black" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" style="border: 2px solid #555" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" style="color:black" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" style="border: 2px solid #555" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    {{--Roles--}}
                    @permission(['admin'])
                    <div class="form-group row">
                        <label for="roles" style="color:black" class="col-md-4 col-form-label text-md-right">{{ __('Roles') }}</label>

                        <div class="col-md-6">
                            <select id="roles"  style="border: 2px solid #555" class="form-control" name="roles">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}"> {{ $role->display_name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{--Centros Acopio--}}
                    <div class="form-group row">
                        <label for="centro_acopio" style="color:black" class="col-md-4 col-form-label text-md-right">{{ __('Centros de Acopio') }} </label>

                        <div class="col-md-6">
                            <select id="centro_acopio"  style="border: 2px solid #555" class="form-control" name="centro_acopio">
                                @foreach($centros_acopio as $centro_acopio)
                                    <option value="{{ $centro_acopio->id }}"> {{ $centro_acopio->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endpermission

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('Registrar Usuario') }} <i class="fas fa-user-plus"></i>
                            </button>

                        </div>
                    </div>
                    </br>
                </form>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
</div>
@endsection
