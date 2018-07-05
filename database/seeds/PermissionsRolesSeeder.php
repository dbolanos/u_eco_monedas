<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionsRolesSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $permissions = [
            [
                'name'          => 'admin',
                'display_name'  => 'Administrador',
                'description'   => 'Acceso total a todas las funciones'
            ],
            [
                'name'          => 'centro_acopio',
                'display_name'  => 'Centros de Acopio',
                'description'   => 'Gestion de centros de Acopio'
            ],
            [
                'name'          => 'materiales_reciclables',
                'display_name'  => 'Tipos de Materiales Reciclables',
                'description'   => 'Gestion de tipos de materiales reciclables'
            ],
            [
                'name'          => 'cupones_canje',
                'display_name'  => 'Cupones de Canje',
                'description'   => 'Cupones de Canje'
            ],
            [
                'name'          => 'admin_usuarios',
                'display_name'  => 'Administrador de Usuario',
                'description'   => 'Gestion de usuarios de tipo Administrador de Centro de Acopio y Cliente'
            ],
            [
                'name'          => 'cambio_contrasena',
                'display_name'  => 'Cambio de Contrasena',
                'description'   => 'Cambiar Contrasena'
            ],
        ];

        //Crear el objeto en la base de datos
        foreach($permissions as $permission){
            Permission::create($permission);
        }

        $roles =[
            [
                'name'          => 'admin',
                'display_name'  => 'Administrador',
                'description'   => 'Total Dominio'
            ],
            [
                'name'          => 'admin_centros_acopio',
                'display_name'  => 'Administrador de Centro de Acopio',
                'description'   => 'Administra el centro de acopio al que fue asignado'
            ],
            [
                'name'          => 'cliente',
                'display_name'  => 'Cliente',
                'description'   => 'Cliente de Eco-Monedas'
            ],

        ];

        //Crear el objeto en la base de datos
        foreach($roles as $role){
            Role::create($role);
        }

        //Asignar todos los permisos al rol de Administrador General
        $permisos_administrador = Permission::all();
        $rol_administrador      = Role::find(1);
        foreach($permisos_administrador as $permiso_administrador){
            $rol_administrador->attachPermission($permiso_administrador);
        }

        //Asignar los permisos respectivos al rol de Administrador de Acopio
        $rol_admin_acopio      = Role::find(2);
        $rol_admin_acopio->attachPermission(Permission::find(2));
        $rol_admin_acopio->attachPermission(Permission::find(3));
        $rol_admin_acopio->attachPermission(Permission::find(6));
        
        $rol_cliente           = Role::find(3);
        $rol_cliente->attachPermission(Permission::find(6));
        
    }
}
