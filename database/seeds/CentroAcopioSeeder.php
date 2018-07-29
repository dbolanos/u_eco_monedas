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
        $centro_acopio->nombre              = 'General';
        $centro_acopio->provincia           = 'General';
        $centro_acopio->direccion_exacta    = 'General';
        $centro_acopio->telefono            = '';
        $centro_acopio->estado              = true;
        $centro_acopio->save();

        $centro_acopio                      = new CentroAcopio();
        $centro_acopio->nombre              = 'Centro Acopio Pacto del Jocote';
        $centro_acopio->provincia           = 'Alajuela';
        $centro_acopio->direccion_exacta    = 'Pacto del Jocote, 25 mts al sur de la Musmani';
        $centro_acopio->telefono            = '23435678';
        $centro_acopio->estado              = true;
        $centro_acopio->save();

        $centro_acopio                      = new CentroAcopio();
        $centro_acopio->nombre              = 'Centro Acopio San Joaquin';
        $centro_acopio->provincia           = 'Heredia';
        $centro_acopio->direccion_exacta    = 'San Joaquin, 100 mts al oeste de Pizzeria La sabrosa y 50 mts norte';
        $centro_acopio->telefono            = '23458778';
        $centro_acopio->estado              = true;
        $centro_acopio->save();


        $centro_acopio                      = new CentroAcopio();
        $centro_acopio->nombre              = 'Centro Acopio San Pedro';
        $centro_acopio->provincia           = 'San Jose';
        $centro_acopio->direccion_exacta    = 'Frente al Mall San Pedro, a un lado de la UNED';
        $centro_acopio->telefono            = '23695678';
        $centro_acopio->estado              = true;
        $centro_acopio->save();
    }
}
