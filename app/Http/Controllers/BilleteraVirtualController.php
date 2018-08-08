<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\CanjeMaterialReciclable;
use Illuminate\Support\Facades\Auth;

class BilleteraVirtualController extends Controller
{
    //

    public function getIndex(){
        $cliente = Auth::user()->cliente;

        $canjes_materiales = CanjeMaterialReciclable::where('cliente_id', $cliente->id)->paginate(5);

        return view('billeteravirtual.index', ['cliente' => $cliente, 'canjes_materiales' => $canjes_materiales]);
    }

}
