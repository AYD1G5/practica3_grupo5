<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Objeto;
use App\Producto;
use App\Funciones;
use App\User;
use App\Factura;

class eCommerceTest extends TestCase
{
    /**
    * Prueba para la funcion calcular SubTotal de Compra
    */
    public function testCalcularSubTotal()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $prod = new Producto();
        $prod->nombre = 'ProductoX';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();

        //Act (Actuar)
        $respuestaFuncion=$funciones->calcularSubTotal($prod->cantidad_disponible,$prod->precio);
        $RespuestaCorrecta=$prod->cantidad_disponible*$prod->precio;
        $prod->delete();

        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
        
    }

    /**
    * Prueba para la funcion calcular IVA
    */
    public function testCalcularIva()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $prod = new Producto();
        $prod->nombre = 'ProductoX';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();
        $razonIVA=1.12;
        $IVA=0.12;

        //Act (Actuar)
        $costo=$prod->precio/$razonIVA;
        $RescpuestaCorrecta=$costo*$IVA;
        $respuestaFuncion=$funciones->calcularIva($prod->precio);
        $prod->delete();

        //Assert (Afirmar)
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);    

    }

    /**
    * Prueba para la funcion Aumentar Stock
    */
    public function testAumentarStock()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $prod = new Producto();
        $prod->nombre = 'ProductoX';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '100';
        $prod->save();
        
        //Act (Actuar)
        $aumento=50;
        $respuestaFuncion=$funciones->aumentarStock($prod->id_producto,$aumento);
        $RescpuestaCorrecta=$prod->cantidad_disponible+$aumento;
        $prod->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }    
    /**
    * Prueba para la funcion calcular IVA
    */    
    public function testDisminuirStock()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $prod = new Producto();
        $prod->nombre = 'ProductoX';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '100';
        $prod->save();
        
        //Act (Actuar)
        $disminucion=150;
        $respuestaFuncion=$funciones->disminuirStock($prod->id_producto,$disminucion);
        $RescpuestaCorrecta=$prod->cantidad_disponible-$disminucion;
        $prod->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

    public function testProductoExiste()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $prod = new Producto();
        $prod->nombre = 'ProductoX';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '100';
        $prod->save();
        
        //Act (Actuar)
        $respuestaFuncion=$funciones->productoExiste($prod->id_producto);
        $prod->delete();
        
        //Assert (Afirmar)
        $this->assertTrue($respuestaFuncion);
    }

    /**
     * Prueba para averiguar el rol del usuario especifico.
     *
     */
    public function testVerificarRolUsuario()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $usuario = new User();
        $usuario->name = 'NameX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '1@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
        
        //Act (Actuar)
        $respuestaFuncion=$funciones->verificarRolUsuario($usuario->id);
        $RescpuestaCorrecta=$usuario->rol;
        $usuario->delete();
        
        //Assert (Afirmar)

        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

    /**
     * Prueba para averiguar si de un producto especifico se puede comprar cierta cantidad de elementos.
     * Respuesta =True
     */
    public function testVerificarExistenciaProducto()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $prod = new Producto();
        $prod->nombre = 'ProductoX';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '100';
        $prod->save();
                
        //Act (Actuar)
        $cantidaRetirar=50;
        $respuestaFuncion=$funciones->verificarExistenciaProducto($prod->id_producto,$cantidaRetirar);
        $prod->delete();
                
        //Assert (Afirmar)
        $this->assertTrue($respuestaFuncion);
    }

        /**
     * Prueba para averiguar si de un producto especifico se puede comprar cierta cantidad de elementos.
     * Respuesta =false
     */
    public function testVerificarExistenciaProducto2()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $prod = new Producto();
        $prod->nombre = 'ProductoX';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '100';
        $prod->save();
                
        //Act (Actuar)
        $cantidaRetirar=150;
        $respuestaFuncion=$funciones->verificarExistenciaProducto($prod->id_producto,$cantidaRetirar);
        $prod->delete();
                
        //Assert (Afirmar)
        $this->assertTrue(!$respuestaFuncion);
    }

    /**
     * Prueba para sumar el subtotal de una coleccion.
     *
     */
    public function testCalcularTotal()
    {
        //Arrange (Preparar)
        $funciones=new Funciones(); 
        $subtotalesCollection = new Collection();
        $objeto1 = new Objeto();
        $objeto1->subtotal = 50;
        $subtotalesCollection->push($objeto1);
        $objeto2 = new Objeto();
        $objeto2->subtotal = 120;
        $subtotalesCollection->push($objeto2);
        $objeto3 = new Objeto();
        $objeto3->subtotal = 70;
        $subtotalesCollection->push($objeto3);
        $objeto4 = new Objeto();
        $objeto4->subtotal = 250;
        $subtotalesCollection->push($objeto4);
        
        //Act (Actuar)
        $respuestaFuncion=$funciones->calcularTotal($subtotalesCollection);
        $RescpuestaCorrecta=490;
        
        //Assert (Afirmar)
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);   
    }

        /**
     * Prueba para averiguar el estado del pedido realizado por un cliente.
     *
     */
    public function testVerificarExistePedido()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $factura=new Factura();
        $factura->id_user = '1';
        $factura->fecha = '21-09-18, 12:31:49 AM';
        $factura->estado = '0';
        $factura->total = '1000';
        $factura->save();

        //Act (Actuar)
        $respuestaCorrecta=1;
        $respuestaFuncion=$funciones->verificarExistePedido($factura->id_factura);
        $factura->delete();
                
        //Assert (Afirmar)
        $this->assertEquals($respuestaCorrecta,$respuestaFuncion);
    }

     /**
     * Prueba para averiguar si el stock de productos puede satisfacer la compra a realizar.
     * Respuesta: True
     */

    public function testVerificarStock()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $prod = new Producto();
        $prod->nombre = 'ProductoX';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();

        //Act (Actuar)
        $disminucion=50;
        $respuestaFuncion=$funciones->verificarStock($prod->id_producto,$disminucion);
        $RescpuestaCorrecta=true;
        $prod->delete();

        //Assert (Afirmar)
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
        
    }

     /**
     * Prueba para averiguar si el stock de productos puede satisfacer la compra a realizar.
     * Respuesta: False
     */
    public function testVerificarStock2()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $prod = new Producto();
        $prod->nombre = 'ProductoX';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();

        //Act (Actuar)
        $disminucion=150;
        $respuestaFuncion=$funciones->verificarStock($prod->id_producto,$disminucion);
        $RescpuestaCorrecta=false;
        $prod->delete();

        //Assert (Afirmar)
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
        
    }

   /**
     * Prueba para verificiar el metodo que realiza aumentos en el carrito de 
     * compras de cierto usuario.
     *
     */
    public function testAumentarCarro()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $usuario = new User();
        $usuario->name = 'NameX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '2@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->no_items = '7';
        $usuario->save();
        $aumento=5;
        
        //Act (Actuar)
        $respuestaFuncion=$funciones->aumentarCarro($usuario->id,$aumento);
        $usuario2=User::where('id','=',$usuario->id)->first();
        $RescpuestaCorrecta=$usuario2->no_items;
        $usuario->delete();
        
        //Assert (Afirmar)

        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

   /**
     * Prueba para verificiar el metodo que realiza aumentos en el carrito de 
     * compras de cierto usuario.
     *
     */
    public function testDisminuirCarro()
    {
        //Arrange (Preparar)
        $funciones=new Funciones();
        $usuario = new User();
        $usuario->name = 'NameX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '3@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->no_items = '7';
        $usuario->save();
        $aumento=5;
        
        //Act (Actuar)
        $respuestaFuncion=$funciones->disminuirCarro($usuario->id,$aumento);
        $usuario2=User::where('id','=',$usuario->id)->first();
        $RescpuestaCorrecta=$usuario2->no_items;
        $usuario->delete();
        
        //Assert (Afirmar)

        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }


    
}
