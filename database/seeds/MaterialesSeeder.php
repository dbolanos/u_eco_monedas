<?php

use Illuminate\Database\Seeder;
use App\MaterialReciclable;
class MaterialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $material_reciclable                  = new MaterialReciclable();
      $material_reciclable->nombre          = 'Plastico y Tetrapack';
      $material_reciclable->ruta_imagen     = 'public';
      $material_reciclable->valor_ecomoneda = 50;
      $material_reciclable->color           = '#0404B4';
      $material_reciclable->save();

        $material_reciclable                  = new MaterialReciclable();
        $material_reciclable->nombre          = 'Vidrio';
        $material_reciclable->ruta_imagen     = 'public';
        $material_reciclable->valor_ecomoneda = 75;
        $material_reciclable->color           = '#FE9A2E';
        $material_reciclable->save();

        $material_reciclable                  = new MaterialReciclable();
        $material_reciclable->nombre          = 'Aluminio';
        $material_reciclable->ruta_imagen     = 'public';
        $material_reciclable->valor_ecomoneda = 100;
        $material_reciclable->color           = '#FFFF00';
        $material_reciclable->save();

        $material_reciclable                  = new MaterialReciclable();
        $material_reciclable->nombre          = 'Electronicos';
        $material_reciclable->ruta_imagen     = 'public';
        $material_reciclable->valor_ecomoneda = 100;
        $material_reciclable->color           = '#29220A';
        $material_reciclable->save();

        $material_reciclable                  = new MaterialReciclable();
        $material_reciclable->nombre          = 'Llantas';
        $material_reciclable->ruta_imagen     = 'public';
        $material_reciclable->valor_ecomoneda = 200;
        $material_reciclable->color           = '#3B0B0B';
        $material_reciclable->save();
    }
}
