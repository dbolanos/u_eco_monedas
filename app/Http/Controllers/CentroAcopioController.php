<?php

namespace App\Http\Controllers;

use DB;
use App\CanjeMaterialReciclable;
use App\CentroAcopio;
use App\Provincias;
use App\Charts\Graficos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//Para usar el pdf
use PDF;
use Illuminate\Support\Facades\Storage;
class CentroAcopioController extends Controller
{

  public function getIndex(){
    $centros = CentroAcopio::where('estado',true)->where('id','!=',1)->orderBy('provincia_id', 'asc')->get();
    $provincias = Provincias::all();
    return view('centrosacopio.index',['centros'=>$centros, 'provincias'=>$provincias]);
  }

  public function getAdminIndex(){
    $centros = CentroAcopio::where('id', '!=', 1)->orderBy('provincia_id', 'asc')->paginate(5);
    return view('admin.centrosacopio.index',['centros'=>$centros]);
  }

  public function getAdminCreate(){
    $provincias = Provincias::all();
    return view('admin.centrosacopio.create',['provincias' => $provincias]);
  }

  public function CentroAdminCreate( Request $request)
  {
    $this->validate($request, [
        'nombre' => 'required|min:5',
        'direccion' => 'required|min:10',
        'telefono' => 'required|min:8',
    ]);
      $centroacopio= new CentroAcopio;
      $centroacopio->nombre = Input::get("nombre");
      $centroacopio->direccion_exacta = Input::get("direccion");
      $centroacopio->telefono = Input::get("telefono");
      $centroacopio->estado = Input::get("estado");
      $provincia= Provincias::find($request->input('provincias'));
      $centroacopio->provincia()->associate($provincia);
      $centroacopio->save();
      return redirect()->route('centros.index')->with('info', 'Centro Acopio: ' . $request->input('nombre').' creado');
  }

  public function getAdminEdit( $id)
  {
    $centroacopio = CentroAcopio::find($id);
    $provincias = Provincias::all();
    return view('admin.centrosacopio.edit',['centroacopio' => $centroacopio,'provincias' => $provincias]);
  }

  public function CentroAdminEdit( Request $request)
  {
    $this->validate($request, [
        'nombre' => 'required|min:5',
        'direccion' => 'required|min:10',
        'telefono' => 'required|min:8',
        'estado' => 'required'
    ]);
      $centroacopio= CentroAcopio::find($request->input('id'));
      $centroacopio->nombre = Input::get("nombre");
      $centroacopio->direccion_exacta = Input::get("direccion");
      $centroacopio->telefono = Input::get("telefono");
      $centroacopio->estado = Input::get("estado");
      $provincia= Provincias::find($request->input('provincias'));
      $centroacopio->provincia()->associate($provincia);
      $centroacopio->save();
      return redirect()->route('centros.index')->with('info', 'Centro Acopio: ' . $request->input('nombre').' editado');
  }

  public function configurarReporte(){
      return view('centrosacopio.configurarReporte');
  }

  public function generarReporte(Request $request){

      $fecha_inicial = date('Y-m-d H:i', strtotime($request->fecha_inicial));
      $fecha_final  = date('Y-m-d H:i', strtotime($request->fecha_final));

      $reporte = $this->crearReporte($fecha_inicial, $fecha_final);

      return view('centrosacopio.generarReporte', ['chart' => $reporte['chart'], 'canje_materiales' => $reporte['canje_materiales'], 'total_ecomonedas' => $reporte['total_ecomonedas'], 'fecha_inicial' => $fecha_inicial, 'fecha_final' => $fecha_final]);
  }

  private function crearReporte($fecha_inicial, $fecha_final){
      $chart        = new Graficos();
      $titulo="Eco-Monedas producidas por cada Centro de Acopio en un periodo";

      $canje_materiales = CanjeMaterialReciclable::select(DB::raw("sum(total_eco_monedas) as total"), DB::raw("centro_acopio_id"))
          ->whereNotIn('centro_acopio_id', [1])
          ->whereBetween('fecha_canje',[$fecha_inicial, $fecha_final])
          ->orderBy('centro_acopio_id', 'desc')
          ->groupBy('centro_acopio_id')
          ->with('centroAcopio')
          ->get();

      $total_ecomonedas = 0;
      $etiquetas=[];
      foreach($canje_materiales as $canje){
          $etiquetas[]      = $canje->centroAcopio->nombre;
          $total_ecomonedas += $canje->total;

      }

      $cantidades=$canje_materiales->pluck('total');

      //labels
      $chart->labels($etiquetas);

      $dataset=$chart->dataset($titulo, 'pie',$cantidades);
      $dataset->backgroundColor(['#a9cce3', ' #a9dfbf', '#fad7a0','#c39bd3','#f9e79f','#a3e4d7', '#fadbd8', '#e59866']);
      $dataset->color(['#2980b9', '#52be80', '#f0b27a','#7d3c98', '#f4d03f','#48c9b0','#f1948a','#d35400']);

      return ['chart' => $chart, 'canje_materiales' => $canje_materiales, 'total_ecomonedas' => $total_ecomonedas, ];
  }

  public function descargarReporte(Request $request){
      $fecha_inicial = date('Y-m-d H:i', strtotime($request->fecha_inicial));
      $fecha_final  = date('Y-m-d H:i', strtotime($request->fecha_final));

      $reporte = $this->crearReporte($fecha_inicial, $fecha_final);


      $pdf = PDF::loadView('centrosacopio.pdfReporte', ['chart' => $reporte['chart'], 'canje_materiales' => $reporte['canje_materiales'], 'total_ecomonedas' => $reporte['total_ecomonedas'], 'fecha_inicial' => $fecha_inicial, 'fecha_final' => $fecha_final]);
      //Nombre a especificar
      return $pdf->download('centros-acopio-report-'.$fecha_inicial.'_to_'.$fecha_final.'.pdf');
  }

}
