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
      $material_reciclable->nombre          = 'Plástico';
      $material_reciclable->ruta_imagen     = 'public';
      $material_reciclable->valor_ecomoneda = 100;
      $material_reciclable->color           = '#0000FF';
      $material_reciclable->save();
    }
}
