<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\MaterialReciclable;
use App\CanjeMaterialReciclable;
use Illuminate\Http\Request;

class CanjeMaterialReciclableController extends Controller
{
    //

    public function getIndexCanjeMaterial(){
        $materiales = MaterialReciclable::all();
        $clientes   = Cliente::all();
        return view('materiales.canjemateriales',['materiales'=>$materiales,'clientes'=>$clientes]);
    }


    public function guardarCanjeMaterial(Request $request){

            $canje_materiales = new CanjeMaterialReciclable();
            $fecha_actual = new \DateTime();

            $detalles = $request->detalles;

            $canje_materiales->user_id              = $request->usuario_id;
            $canje_materiales->clientes_id          = $request->cliente_id;
            $canje_materiales->centro_acopio_id     = $request->centro_acopio_id;
            $canje_materiales->total_eco_monedas    = $detalles['total_ecomonedas'];
            $canje_materiales->detalles             = json_encode($detalles['detalles_items']);

            $canje_materiales->fecha_canje = $fecha_actual->format('Y-m-d H:i:s');

            $canje_materiales->save();

            return json_encode('Canje registrado, Id: '. $canje_materiales->id);

    }




}
