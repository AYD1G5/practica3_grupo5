<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;
use App\User;
use App\Factura;

class Funciones extends Model
{
   /**
    *  funcion calcular SubTotal de Compra
    */
    public function calcularSubTotal($cantidad,$precio)
    {
        $respuesta=0;
        $respuesta=$cantidad * $precio;
        return $respuesta;
    }

    /**
    *funcion calcular IVA del precio de un producto
    */
    public function calcularIva($precio)
    {
        $iva=0;
        $razon=1.12;
        $costo=$precio/$razon;
        $porcentajeIva=0.12;
        $iva=$costo*$porcentajeIva;
        return $iva;
        
    }   
    
    /**
    * Funcion para Aumentar Stock de un producto en inventario
    */
    public function aumentarStock($id_producto,$cantidad)
    {
        $producto=Producto::where('id_producto','=',$id_producto)->first();
        $producto->cantidad_disponible=$producto->cantidad_disponible+$cantidad;
        $producto->save();
        $producto2=Producto::where('id_producto','=',$id_producto)->first();
        return $producto2->cantidad_disponible;
    }  
    
    /**
    * Funcion para Disminuir Stock de un producto en inventario
    */
    public function disminuirStock($id_producto,$cantidad)   
    {
        $producto=Producto::where('id_producto','=',$id_producto)->first();
        if(($producto->cantidad_disponible-$cantidad) >= 0){
            $producto->cantidad_disponible=$producto->cantidad_disponible-$cantidad;
            $producto->save();    
        }
        $producto2=Producto::where('id_producto','=',$id_producto)->first();
        return $producto2->cantidad_disponible;
    }

    /**
    * Funcion para Verificar que el Stock tenga suficientes productos
    */
    public function verificarStock($id_producto,$cantidad)   
    {
        $producto=Producto::where('id_producto','=',$id_producto)->first();
        if($producto->cantidad_disponible >= $cantidad){
            return true;
        }else{
            return false;
        }
    }
    /**
    * Funcion para Aumentar la cantidad de productos en el carrito
    */
    public function aumentarCarro($id_user,$cantidad)   
    {
        $usuario = User::find($id_user);
        $usuario->no_items = $usuario->no_items + $cantidad;
        $usuario->save();
        return $usuario->no_items;
    }

    /**
    * Funcion para Disminuir la cantidad de productos en el carrito
    */
    public function disminuirCarro($id_user,$cantidad)   
    {
        $usuario = User::find($id_user);
        if(($usuario->no_items - 1) >= 0){
            $usuario->no_items = $usuario->no_items - 1;
        }
        $usuario->save();
        return $usuario->no_items;
    }
    /**
    * Funcion para Verificar si existe un producto en inventario
    */
    public function productoExiste($id_producto)
    {
        $respuesta=false;
        $producto=Producto::findOrFail($id_producto);
        if(!$producto == null)
        {
            $respuesta=true;
        }

        return $respuesta;        
    }

    /**
    * Funcion para Verificar que rol tiene un usuario
    */
    public function verificarRolUsuario($id_usuario){
         $estudiantes = User::where('id','=',$id_usuario)->first();
         return $estudiantes->rol;
       
     }

    /**
    * Funcion para Verificar si el stock de un producto
    * puede cubrir una compra
    */
    public function verificarExistenciaProducto($id_producto, $cantidad){
        $producto = Producto::where('id_producto','=',$id_producto)->first();;
        if($producto->cantidad_disponible-$cantidad>0){
            return true;
        }else{
            return false;
        }
     }

    /**
    * Funcion que servira para la vista en que el usuario podrá 
    * verificar si existe su pedido
    */
    public function verificarExistePedido($id_factura){
        $factura = Factura::where('id_factura','=', $id_factura)->get();
        return count($factura);
    }

    /**
    * Recibe una coleccion de datos donde existe un campo llamado Subtotal y los sumara 
    * todos para obtener un total.
    */
    public function calcularTotal($elementos){
        $factura = Factura::where('id_factura')->first();
        $suma = 0;
        foreach($elementos as $elemento){
            $suma += $elemento->subtotal;
        }
        return $suma;
    }
}
