<?php

use Illuminate\Database\Seeder;
use App\CentroAcopio;


class CentroAcopioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $centro_acopio                      = new CentroAcopio();
        $centro_acopio->nombre              = 'Centro Acopio 1';
        $centro_acopio->provincia           = 'Alajuela';
        $centro_acopio->direccion_exacta    = 'Pacto del Jocote';
        $centro_acopio->telefono            = '23435678';
        $centro_acopio->estado              = true;
        $centro_acopio->save();

        $centro_acopio                      = new CentroAcopio();
        $centro_acopio->nombre              = 'Centro Acopio 2';
        $centro_acopio->provincia           = 'Heredia';
        $centro_acopio->direccion_exacta    = 'San Joaquin';
        $centro_acopio->telefono            = '23458778';
        $centro_acopio->estado              = true;
        $centro_acopio->save();


        $centro_acopio                      = new CentroAcopio();
        $centro_acopio->nombre              = 'Centro Acopio 3';
        $centro_acopio->provincia           = 'San Jose';
        $centro_acopio->direccion_exacta    = 'San Pedro';
        $centro_acopio->telefono            = '23695678';
        $centro_acopio->estado              = true;
        $centro_acopio->save();
    }
}
