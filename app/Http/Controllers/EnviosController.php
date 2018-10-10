<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use DB;

class EnviosController extends Controller
{
    public function EnviosAdmin(){
        $facturas =DB::Select("select * from factura");
        return view('EnviosAdmin')->with('facturas', $facturas);
      }
    public function CambiarEstado($estado,$factura)
    {
        $facturas = Factura::where('id_factura', $factura)->first();
        $facturas->estado=$estado;
        $facturas->save();
        return redirect('/EnviosAdmin');
    }
    public function Dashboard(){
        return view('DashAdmin');
      }
}