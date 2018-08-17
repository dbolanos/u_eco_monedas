<?php

namespace App\Http\Controllers;

use App\CentroAcopio;
use App\Cliente;
use App\MaterialReciclable;
use Illuminate\Http\Request;
use App\CanjeMaterialReciclable;
use Illuminate\Support\Facades\Auth;


class CanjeMaterialReciclableController extends Controller
{
    //

    public function getIndexCanjeMaterial(){
        $centro_acopio = CentroAcopio::find(Auth::user()->centroAcopio->id);
        if($centro_acopio->estado){
            $materiales = MaterialReciclable::all();
            $clientes   = Cliente::all();
            return view('materiales.canjemateriales',['materiales'=>$materiales,'clientes'=>$clientes]);
        }
        return view('errors.centroAcopioDesactivado');
    }


    public function guardarCanjeMaterial(Request $request){

            $canje_materiales   = new CanjeMaterialReciclable();
            $fecha_actual       = new \DateTime();
            $detalles           = $request->detalles;

            $canje_materiales->user_id              = Auth::id();
            $cliente                                = Cliente::find($request->cliente_id);
            $cliente->eco_monedas_disponibles       += $detalles['total_ecomonedas'];
            $canje_materiales->cliente()->associate($cliente);
            $canje_materiales->centro_acopio_id     = $request->centro_acopio_id;
            $canje_materiales->total_eco_monedas    = $detalles['total_ecomonedas'];
            $canje_materiales->detalles             = json_encode($detalles['detalles_items']);
            $canje_materiales->fecha_canje          = $fecha_actual->format('Y-m-d H:i:s');

            $canje_materiales->save();
            $cliente->save();

            return json_encode($canje_materiales->id);

    }

    public function mostrarTodosCanjesMaterialReciclable(){
        $cliente            = Cliente::find(Auth::user()->cliente->id);
        $canjes_materiales  = CanjeMaterialReciclable::where('cliente_id', $cliente->id)->orderBy('id','desc')->paginate(8);

        return view('materiales.canjeFacturas', compact('cliente', 'canjes_materiales'));
    }

    public function detalleCanjesMaterialReciclable($id){
        $canje = CanjeMaterialReciclable::find($id);

        return view('materiales.canjeDetalleFactura', compact('canje'));
    }




}
