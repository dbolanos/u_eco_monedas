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
        $centro_acopio->nombre              = 'Recicladora y Maquila HYO';
        $centro_acopio->provincia_id        = 2;
        $centro_acopio->direccion_exacta    = '50 metros sur del matadero de Pipasa';
        $centro_acopio->telefono            = '24398128';
        $centro_acopio->estado              = 1;
        $centro_acopio->save();

        $centro_acopio                      = new CentroAcopio();
        $centro_acopio->nombre              = 'Centro de Acopio la Sylvia';
        $centro_acopio->provincia_id        = 4;
        $centro_acopio->direccion_exacta    = 'San Pablo. 150m norte de la Ermita San Pablo de Barva';
        $centro_acopio->telefono            = '83267044';
        $centro_acopio->estado              = 1;
        $centro_acopio->save();

        $centro_acopio                      = new CentroAcopio();
        $centro_acopio->nombre              = 'Municipalidad de Alajuelita';
        $centro_acopio->provincia_id        = 1;
        $centro_acopio->direccion_exacta    = 'Costado Norte del Parque Central de Alajuelita';
        $centro_acopio->telefono            = '22546002';
        $centro_acopio->estado              = 0;
        $centro_acopio->save();
    }
}
