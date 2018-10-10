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
class CarritoController extends Controller
{
    public $func = NULL;
    public function __construct()
    {   
        $this->func = new Funciones();
        $this->middleware('auth');
    }

    public function carritoUsuario(){
        return $carrito_usuario=DB::table('carrito as c')
        ->where('c.id_user', '=', Auth::id())
        ->first();
    }

    public function vaciarCarro(){
        $carrito_usuario=$this->carritoUsuario();
        $us = User::find(Auth::id());
        $us->no_items = 0;
        $us->save();
        DB::table('carrito_producto')
        ->where('id_carrito', $carrito_usuario->id_carrito)
        ->delete();     
    }

    public function listar(){
        $carrito_usuario=$this->carritoUsuario();
        $productoscarrito=DB::table('carrito_producto as cp')
        ->where('cp.id_carrito', '=', $carrito_usuario->id_carrito)
        ->get();     
        $total = 0;
        foreach($productoscarrito as $pcar){
                $pcar->subtotal = $subtotal = $this->func->calcularSubTotal($pcar->cantidad, $pcar->precio);    
                $total = $total + $pcar->subtotal;
            
        }
        return view('CARRITO.Listar', ["productoscarrito"=>$productoscarrito, "total"=>$total]);
    }

    public function vaciarRuta(){
        $this->vaciarCarro();
        return Redirect::to('/Carrito/ListarProductos')
        ->with('notice', 'Carrito Vaciado!');
    }

    public function eliminar($id){
        $producto = Carrito_Producto::find($id);
        $producto->delete();
        $this->func->disminuirCarro(Auth::id(), 1);
        return Redirect::to('/Carrito/ListarProductos');
    }

    public function agregaralcarrito(Request $request, $id){       
        $carrito_usuario=$this->carritoUsuario();
        $yaestaagregado = DB::table('carrito_producto')
                    ->where('id_producto', $id)
                    ->get();
        if(count($yaestaagregado)>0){
            return Redirect::to('/Carrito/ListarProductos')
            ->with('notice', 'El producto ya esta agregado');
        }
        $prod = Producto::find($id);
        if(!$this->func->verificarStock($prod->id_producto, $request->input('cantidad'))){
            return Redirect::to('/Carrito/ListarProductos')
            ->with('notice', 'No tenemos suficientes productos en Stock');
        }

        $productocarrito = new Carrito_Producto();
        $productocarrito->id_carrito = $carrito_usuario->id_carrito;
        $productocarrito->id_producto = $prod->id_producto;
        $productocarrito->nombre_producto = $prod->nombre;
        $productocarrito->ruta_imagen = $prod->ruta_imagen;
        $productocarrito->cantidad = $request->input('cantidad');
        $productocarrito->precio = $prod->precio;
        #$productocarrito->subtotal = 
        $productocarrito->save();

        $this->func->aumentarCarro(Auth::id(), 1);
        return Redirect::to('/Carrito/ListarProductos');
    }

    public function actualizarcantidad(Request $request, $id){
        $producto = Carrito_Producto::find($id);
        $prod = Producto::find($producto->id_producto);
        if(!$this->func->verificarStock($prod->id_producto, $request->input('cantidad'))){
            return Redirect::to('/Carrito/ListarProductos')
            ->with('notice', 'No tenemos suficientes productos en Stock');
        }
        $producto->cantidad = $request->input('cantidad');
        $producto->update();
        return Redirect::to('/Carrito/ListarProductos');
    }

    public function finalizarCompra(){
        $carrito_usuario=$this->carritoUsuario();
        $productoscarrito=DB::table('carrito_producto')
        ->where('id_carrito', '=', $carrito_usuario->id_carrito)
        ->get();   
        $id_fac = 0;
        if(count($productoscarrito)>0){
            $fac = new Factura();
            $fac->id_user = Auth::id();
            $fac->fecha = date("d-m-y, h:i:s A");
            $fac->estado = 0;
            $fac->save();
            $total = 0;
            foreach($productoscarrito as $pcar){
                if($this->func->productoExiste($pcar->id_producto)){
                    $fac_prod = new Factura_Producto();
                    $fac_prod->id_factura = $fac->id_factura; 
                    $fac_prod->id_producto = $pcar->id_producto;
                    $fac_prod->nombre_producto = $pcar->nombre_producto;
                    $fac_prod->ruta_imagen = $pcar->ruta_imagen;
                    $fac_prod->cantidad = $pcar->cantidad;
                    $fac_prod->precio = $pcar->precio;

                    $this->func->disminuirStock($pcar->id_producto, $pcar->cantidad);
                    $fac_prod->subtotal = $subtotal = $this->func->calcularSubTotal($pcar->cantidad, $pcar->precio);    
                    $fac_prod->save();
                    $total = $total + $fac_prod->subtotal;
                }
            }
            $fac->total = $total;
            $fac->save();
            $id_fac = $fac->id_factura;
        }
        $this->vaciarCarro();
        if($id_fac == 0){
            return Redirect::to('/Catalogo');
        }else{
            return Redirect::to('/Facturas/DetalleFactura/'.$id_fac);
        }
    }
}
