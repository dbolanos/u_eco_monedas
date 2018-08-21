<?php

namespace App\Http\Controllers;

use PDF;
use App\CanjeCupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\QrCode;

class CanjeCuponController extends Controller
{

  public function mostrarTodosCanjesCupones(){
      $cliente = Auth::user()->cliente;
      $canjes_cupones = CanjeCupon::where('cliente_id', $cliente->id)->orderBy('id','desc')->paginate(8);
      $canjes_cupones->transform(function($canje, $key) {
        $canje->cart = unserialize($canje->cart);
        return $canje;
      });

      return view('cupones.canjeFacturas', compact('cliente', 'canjes_cupones'));
  }

  public function detalleCanjesCupones($id){
      $canje = CanjeCupon::where('id',$id)->first();
      $carrito = unserialize($canje->cart);
      return view('cupones.canjeDetalleFactura', compact('canje','carrito'));
  }

  public function descargarPDF($id){
    $canje = CanjeCupon::where('id',$id)->first();
    $carrito = unserialize($canje->cart);
    $pdf=PDF::loadView('cupones.reportePDF',compact('canje','carrito','qr'));
    return $pdf->download('reportePDF-'.time().'.pdf');
  }
}
