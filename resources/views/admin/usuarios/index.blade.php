@extends('layouts.master')
@section('titulo','Gestión Usuarios')
@section('contenido')
    @if($mensaje = Session::get('mensaje'))
        <div class="alert alert-{{$mensaje['tipo_mensaje']}}" role="alert">
            {!! $mensaje['msg'] !!}
            <button type="button" class="close" data-dismiss="alert" areia-label="Close"><span
                        aria-hidden="true">&times;</span></button>
        </div>
    @endif
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card border-secondary mb-3" style="max-width: 25rem;">
                    <div class="card-header"><strong>Filtros</strong> <i class="fas fa-filter"></i></div>
                    <div class="card-body">
                        <form action="{{ route('filtro-rol.usuario') }}" method="POST">
                            @csrf
                            <label for="role_filtro">Buscar por Role:</label>
                            <select name="role_filtro" id="role_filtro" class="custom-select">
                                <option value="0">Todos</option>
                                @foreach($roles as $role)
                                    {{--@if($role_id == $role->id)--}}
                                    <option value="{{ $role->id }}"> {{ $role->display_name }}</option>
                                @endforeach
                            </select>
                            <br><br>
                            <button type="submit" class="btn btn-success">Filtrar</button>
                        </form>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header">
                        <div class="text-center"><h2>Usuarios</h2></div>
                    </div>
                    <div class="card-body">
                    {{--Table--}}
                    <table class="table table-hover">
                        <thead>
                        <tr class="table-primary">
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Centro Acopio</th>
                            {{--<th scope="col">Estado</th>--}}
                            <th scope="col">Editar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->centroAcopio()->first()->nombre }}</td>
                                {{--<td>{{ $usuario->estado == 1 ? 'activo' : 'inactivo' }}</td>--}}
                                <td> <a class="btn btn-outline-primary" href="{{ route('editar.usuario', $usuario->id) }}"><i class="fas fa-user-edit"></i> Editar</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--End-Table--}}
                    </div>
                </div>
                <div class="card-footer">
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
