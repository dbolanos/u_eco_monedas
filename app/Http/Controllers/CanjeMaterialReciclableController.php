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


}
