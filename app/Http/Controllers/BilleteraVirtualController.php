<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\CanjeMaterialReciclable;
use App\CanjeCupon;
use Illuminate\Support\Facades\Auth;

class BilleteraVirtualController extends Controller
{
    //

    public function getIndex(){
        $cliente = Auth::user()->cliente;

        $canjes_materiales = CanjeMaterialReciclable::where('cliente_id', $cliente->id)->orderBy('id','desc')->take(4)->get();

        $canjes_cupones = CanjeCupon::where('cliente_id', $cliente->id)->orderBy('id','desc')->take(4)->get();
        $canjes_cupones->transform(function($canje, $key) {
          $canje->cart = unserialize($canje->cart);
          return $canje;
        });

        return view('billeteravirtual.index', ['cliente' => $cliente, 'canjes_materiales' => $canjes_materiales, 'canjes' => $canjes_cupones]);
    }

}
