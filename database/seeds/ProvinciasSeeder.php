<?php

use Illuminate\Database\Seeder;

class ProvinciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $plataforma= new \App\Provincias();
      $plataforma->nombre = 'San José';
      $plataforma->save();

      $plataforma= new \App\Provincias();
      $plataforma->nombre = 'Alajuela';
      $plataforma->save();

      $plataforma= new \App\Provincias();
      $plataforma->nombre = 'Cartago';
      $plataforma->save();

      $plataforma= new \App\Provincias();
      $plataforma->nombre = 'Heredia';
      $plataforma->save();

      $plataforma= new \App\Provincias();
      $plataforma->nombre = 'Guanacaste';
      $plataforma->save();

      $plataforma= new \App\Provincias();
      $plataforma->nombre = 'Puntarenas';
      $plataforma->save();

      $plataforma= new \App\Provincias();
      $plataforma->nombre = 'Limón';
      $plataforma->save();
    }
}
