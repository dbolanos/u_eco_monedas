<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionsRolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProvinciasSeeder::class);
        $this->call(CentroAcopioSeeder::class);
        $this->call(MaterialesSeeder::class);
        $this->call(CuponesSeeder::class);
    }
}
