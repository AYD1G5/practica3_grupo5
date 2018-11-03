<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use App\Funciones;
class NewFuncionController extends Controller
{
    public $func = NULL;
    public function __construct()
    {   
        $this->func = new Funciones();
        $this->middleware('auth');
    }
    //este metodo lo utilizaremos para realizar la logica de New funcion
    public function NewFuncion()
    {
        //    return view('CrearGrupo.CrearGrupo');

    }
    public function pago(Request $request)
    {
        $carrito_usuario=DB::table('carrito as c')
        ->where('c.id_user', '=', Auth::id())
        ->first();
        $productoscarrito=DB::table('carrito_producto as cp')
        ->where('cp.id_carrito', '=', $carrito_usuario->id_carrito)
        ->get();     
        $total = 0;
        foreach($productoscarrito as $pcar){
                $pcar->subtotal = $subtotal = $this->func->calcularSubTotal($pcar->cantidad, $pcar->precio);    
                $total = $total + $pcar->subtotal;
            
        }
        $pago = $request->input('pago');
        $vuelto=$this->vuelto($total,$pago);
        if($vuelto==-1)
        {
            die("Error");
        }
        else
        {
            //die($vuelto);
            return Redirect::to('/FinalizarCompra');
        }

        
    }
    public function realizarpago()
    {
        $carrito_usuario=DB::table('carrito as c')
        ->where('c.id_user', '=', Auth::id())
        ->first();
        $productoscarrito=DB::table('carrito_producto as cp')
        ->where('cp.id_carrito', '=', $carrito_usuario->id_carrito)
        ->get();     
        $total = 0;
        foreach($productoscarrito as $pcar){
                $pcar->subtotal = $subtotal = $this->func->calcularSubTotal($pcar->cantidad, $pcar->precio);    
                $total = $total + $pcar->subtotal;
            
        }
        return view('Realizar_pago', ["total"=>$total]);
    }
    public function vuelto($total,$pagar)
    {

        if($pagar<$total)
        {
            return "-1";
        }
        else
        {
            return $pagar-$total;
        }
    }
}
