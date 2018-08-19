<?php

namespace App\Http\Controllers;
use App\Cupon;
use App\Cart;
use App\CanjeCupon;
use App\Cliente;
Use Session;
Use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CuponesController extends Controller
{
  public function getCanjeIndex(){
    $cupones = Cupon::orderBy('nombre','asc')->get();
    return view('cupones.canjecupones',['cupones'=>$cupones]);
  }

  public function getAdminIndex(){
    $cupones= Cupon::orderBy('nombre', 'asc')->get();
    return view('admin.cupones.index',['cupones'=>$cupones]);
  }

  public function getAdminCreate(){
    return view('admin.cupones.create');
  }

  public function CuponesAdminCreate( Request $request)
  {
    $this->validate($request, [
        'nombre' => 'required|min:5',
        'descripcion' => 'required|min:5',
        'cantidad' => 'required',
        'archivoImagen' => 'required|image'
    ]);

    $ruta=$request->file('archivoImagen')->store('images','public');

    $cupon = new Cupon;
    $cupon->nombre = Input::get('nombre');
    $cupon->descripcion = Input::get('descripcion');
    $cupon->ruta_imagen = $ruta;
    $cupon->cantidad_ecomonedas = Input::get('cantidad');

    $cupon->save();
    return redirect()->route('cupones.index')->with('info', 'Cupón: ' . $request->input('nombre').' creado');
  }

  public function getAdminEdit( $id)
  {
    $cupon = Cupon::find($id);
    return view('admin.cupones.edit',['cupones' => $cupon]);
  }

  public function CuponesAdminEdit( Request $request)
  {
    $this->validate($request, [
      'nombre' => 'required|min:5',
      'descripcion' => 'required|min:5',
      'cantidad' => 'required',
    ]);
      $cupon= Cupon::find($request->input('id'));
      if(($request->file('archivoImagen')!==null) || ($request->file('archivoImagen')!="")){
        Storage::disk('public')->delete($cupon->ruta_imagen);
        $ruta=$request->file('archivoImagen')->store('images','public');
        $cupon->ruta_imagen=$ruta;
      }
      $cupon->nombre = Input::get("nombre");
      $cupon->descripcion = Input::get('descripcion');
      $cupon->cantidad_ecomonedas = Input::get('cantidad');
      $cupon->save();
      return redirect()->route('cupones.index')->with('info', 'Cupón: ' . $request->input('nombre').' editado');
  }

  public function getAddToCart(Request $request, $id) {
      $cupon = Cupon::find($id);
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($cupon, $cupon->id);

      $request->session()->put('cart', $cart);
      return redirect()->route('eco.canjecupones');
  }

  public function getCart() {
      if (!Session::has('cart')) {
          return view('cupones.carritocupones');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      return view('cupones.carritocupones', ['cupones' => $cart->items, 'totalPrice' => $cart->totalPrice]);
  }

  public function getCheckout()
  {
      if (!Session::has('cart')) {
          return view('cupones.carritocupones');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;
      return view('cupones.checkoutcupones', ['cupones' => $cart->items, 'total' => $total]);
  }

  public function postCheckout(Request $request)
  {
      if (!Session::has('cart')) {
          return redirect()->route('shop.shoppingCart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $mondisp = Auth::user()->cliente()->first()->eco_monedas_disponibles;

      if ($mondisp >= floatval($cart->totalPrice)) {
        $order = new CanjeCupon();
        $cliente = Cliente::where('user_id',Auth::user()->id)->first();
        $cliente->eco_monedas_gastadas += floatval($cart->totalPrice);
        $cliente->eco_monedas_disponibles = ($mondisp - floatval($cart->totalPrice));
        $order->cliente()->associate($cliente);
        $order->cart = serialize($cart);
        $order->save();
        $cliente->save();
      }else {
        return redirect()->route('eco.shoppingCart')->with('error', '¡Eco-Monedas insuficientes para canjear cupones!');
      }

      Session::forget('cart');
      return redirect()->route('eco.canjecupones')->with('success', '¡Cupones Canjeados!');
  }

}
