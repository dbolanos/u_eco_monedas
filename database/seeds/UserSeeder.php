<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user_administrator             = new User();
        $user_administrator->name       = 'Administrator';
        $user_administrator->email      = 'admin@test.test';
        $user_administrator->password   = bcrypt('admin');
        $user_administrator->centro_acopio_id   = 1;
        $user_administrator->estado     = true;
        $user_administrator->save();


        $admin_acopio_user              = new User();
        $admin_acopio_user->name        = 'Dylan Bolaños';
        $admin_acopio_user->email       = 'dbolanos@test.test';
        $admin_acopio_user->password    = bcrypt('testtest');
        $admin_acopio_user->centro_acopio_id    = 2;
        $user_administrator->estado     = true;
        $admin_acopio_user->save();

        $admin_acopio_user_2            = new User();
        $admin_acopio_user_2->name      = 'Diego Arias';
        $admin_acopio_user_2->email     = 'darias@test.test';
        $admin_acopio_user_2->password  = bcrypt('testtest');
        $admin_acopio_user_2->centro_acopio_id    = 3;
        $user_administrator->estado     = true;
        $admin_acopio_user_2->save();

        $administrador_rol  = Role::find(1);
        $admin_acopio_rol   = Role::find(2);

        $user_administrator->roles()->attach($administrador_rol->id);
        $admin_acopio_user->roles()->attach($admin_acopio_rol->id);
        $admin_acopio_user_2->roles()->attach($admin_acopio_rol->id);
        
    }
}
