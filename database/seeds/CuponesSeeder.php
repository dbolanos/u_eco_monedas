<?php

use Illuminate\Database\Seeder;
use App\Cupon;
class CuponesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $cupon                      = new Cupon();
      $cupon->nombre              = 'Entrada 2x1 Cine';
      $cupon->descripcion         = 'Entrada 2x1 para cualquier CCM Cinemas';
      $cupon->cantidad_ecomonedas = 100;
      $cupon->ruta_imagen         = 'public';
      $cupon->save();
    }
}
