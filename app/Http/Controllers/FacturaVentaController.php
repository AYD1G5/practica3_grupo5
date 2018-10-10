<?php

namespace App\Http\Controllers;
use App\Carrito_Producto;
use App\Producto;
use App\Factura_Producto;
use App\Factura;
use App\Funciones;
use Illuminate\Database\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use App\User;
class FacturaVentaController extends Controller
{
    public $func = NULL;
    public function __construct()
    {   
        $this->func = new Funciones();
        $this->middleware('auth');
    }

    public function listarFacturasUsuario(){
        $facturas_usuario=DB::table('factura as f')
        ->where('f.id_user', '=', Auth::id())
        ->get();
        return view('FACTURA.listarfacturas', ["facturas_usuario"=>$facturas_usuario]);
    }

    public function mostrarfactura($id){
        if(($this->func->verificarExistePedido($id))<1){
            return Redirect::to('/Carrito/ListarProductos')
            ->with('notice', 'No existe la factura');
        }
        $fac = Factura::findOrFail($id);
        $detallesfactura=DB::table('factura_producto as fp')
        ->where('fp.id_factura', '=', $id)
        ->get();     
        $total = 0;
        $totaliva = 0;
        foreach($detallesfactura as $det){
            if($this->func->productoExiste($det->id_producto)){
                $det->subtotaliva = $this->func->calcularSubTotal($det->cantidad, $det->precio);    
                $det->iva = $this->func->calcularIva($det->subtotaliva);
                $det->subtotal = $det->subtotaliva - $det->iva;
                
                $totaliva += $det->subtotaliva;
                $total += $det->subtotal;
            }
        }
        return view('FACTURA.mostrar', ["detallesfactura"=>$detallesfactura, "total"=>$total, 
                                        "factura"=>$fac, "totaliva"=>$totaliva]);
    }

}
