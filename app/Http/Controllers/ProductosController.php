<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Producto;
class ProductosController extends Controller
{

    public function guardar(Request $request)
    {
        //
        $prod = new Producto();
        $prod->nombre = $request->input('nombre');
        $prod->descripcion=$request->input('desc'); 
        $prod->cantidad_disponible=$request->input('cantidad');
        
        $file = $request->file('archivo');
        
        $prod->ruta_imagen=$file->getClientOriginalName();
        $prod->precio = $request->input('precio');
        $prod->save();
         //Mover el archivo subido
         $destinationPath = 'fotosproductos/';
         $file->move($destinationPath, $file->getClientOriginalName());
        
         return Redirect::to('/CrearProducto');
    }

    public function mostrar()
    {
        //
        return view('CRUDPRODUCTO.Crear'); 
    }
    
    public function MostrarFormProductos(){
        $productos = Producto::all();
        return view('CRUDPRODUCTO.Editar')->with('productos', $productos);
    }

    public function MostrarFormaParaEditarProductos($idProducto){
        $producto = Producto::where(array(
          'id_producto' => $idProducto
        ))->first();
        return view('CRUDPRODUCTO.Editar2')->with('producto', $producto);
    }

    public function ActualizarProducto(Request $request, $idProducto){
        $productos =Producto::find($idProducto);
        $productos->nombre = $request->nombre;
        $productos->descripcion = $request->desc;
        $productos->cantidad_disponible = $request->cantidad;

        $file = $request->file('archivo');
        
        $productos->ruta_imagen=$file->getClientOriginalName();

        $productos->precio = $request->float;
        $productos->save();
        $us = Producto::all();
            return view('CRUDPRODUCTO.Editar')->with('productos', $us);
    }

    public function EliminarProductos(){
        $productos = Producto::all();
        return view('CRUDPRODUCTO.Eliminar')->with('productos', $productos);
      }
  
      public function EliminarProductos2($idProducto){
              $producto = Producto::where(array(
                'id_producto' => $idProducto
              ))->first();
              $producto->delete();
        $productos = Producto::all();
        return view('CRUDPRODUCTO.Eliminar')->with('productos', $productos);
      }
  

}
