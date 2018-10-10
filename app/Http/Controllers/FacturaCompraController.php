<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use DB;
use App\Detalle_Compra;
use App\Funciones;

class FacturaCompraController extends Controller
{
    /** CONSTRUCT
     *  Revisa que el usuario haya iniciado sesion
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /** INDEX
     *  En la pagina index se mostrará las compras adquiridas actualmente
     *  asi como un form para agregar un nuevo producto
     */
    public function index()
    {
        $productos=DB::table('producto as p')->get();        
        $detalles=DB::table('detalle_compra as dc')->get();
        $total = 0;
        foreach ($detalles as $det){
            $total = $total + $det->subtotal;
        }

        return view('facturacompra.index', ["productos"=>$productos, "detalles"=>$detalles, "total"=>$total]);
    }    

    public function guardar(Request $request)
    {
        $detalle_compra=new Detalle_Compra();
        $nombre_producto=DB::table('producto as p')
        ->select('p.nombre as nombre_producto')
        ->where('p.id_producto', '=', $request->input('id_prod'))
        ->first();
        $detalle_compra->id_producto=$request->input('id_prod');
        $detalle_compra->nombre_producto=$nombre_producto->nombre_producto;
        $cantidad = $request->input('cantidad');
        $detalle_compra->cantidad=$cantidad;
        $precio = $request->input('precio');
        $detalle_compra->precio=$precio;

        $f1 = new Funciones();
        $detalle_compra->subtotal = $f1->calcularSubTotal($cantidad, $precio);
        $detalle_compra->save();
        return $this->index();
    }    
    
    public function eliminar($id){
        $det = Detalle_Compra::find($id);
        $det->delete();
        return Redirect::to('ProveedorProducto/');
    }

    public function finalizar(){
        $detalles = Detalle_Compra::all();
        foreach ($detalles as $det){
            $f1 = new Funciones();
            $f1->aumentarStock($det->id_producto, $det->cantidad);
            $det->delete();
        }
        return Redirect::to('ProveedorProducto/');
    }
}
