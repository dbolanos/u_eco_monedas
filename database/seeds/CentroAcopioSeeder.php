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



    }
}
