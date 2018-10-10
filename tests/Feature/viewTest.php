<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;
use Auth;
use App\Carrito;
use App\Carrito_Producto;
use App\Producto;
use App\Factura;
use App\Factura_Producto;
use App\Detalle_Compra;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FacturaCompraController;
use Illuminate\Support\Facades\Hash;

class viewTest extends TestCase
{

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Carga Masiva
    */
    public function testCargaMasiva(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '4@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/cargamasiva');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText('Nuevo Archivo');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }




    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Catalogo
    */
    public function testVistaCatalogo(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '5@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/Catalogo');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText('Catalogo de productos');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Crear Cliente
    */
    public function testVistaCrearCliente(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '6@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/CrearCliente');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText('CREAR CLIENTE');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista CrearCliente2 POST
    */
    public function testVistaCrearClientePOST(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '7@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '0';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
        
        
        //Act (Actuar)
        $llamaVista=$this->call('POST', '/CrearCliente', [
            'nombres'=>'nombres',
            'apellidos'=>'apellidos',
            'nit'=>'77-7',
            'direnvio'=>'direnvio',
            'correo'=>'correo@correo.com',
            'pass'=>'pass'
        ]);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        $cliente=User::where('email','=','correo@correo.com')->first();
        $cliente->delete();
    
        //Assert (Afirmar)
        $llamaVista->assertSeeText('CREAR CLIENTE');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }


    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista EditarCliente
    */
    public function testVistaEditarCliente(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '9@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/EditarCliente');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText('Editar');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista EditarCliente2
    */
    public function testVistaEditarCliente2(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '10@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Crear Cliente
        $cliente = new User();
        $cliente->name = 'ClienteX';
        $cliente->apellido = 'ApellidoClienteX';
        $cliente->nit = '333-3';
        $cliente->email = '11@gmail.com';
        $cliente->password = 'PasswordX';
        $cliente->rol = '0';
        $cliente->save();
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/EditarCliente2/'.$cliente->id);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        $cliente->delete();
        //Assert (Afirmar)
        $llamaVista->assertSeeText('EDITAR CLIENTE');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

        /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista EditarCliente2 POST
    */
    public function testVistaEditarCliente2POST(){
        //Arrange (Preparar)
            //crear un usuario
            $usuario = new User();
            $usuario->name = 'NuevoX';
            $usuario->apellido = 'ApellidoX';
            $usuario->nit = '333-3';
            $usuario->email = '12@gmail.com';
            $usuario->password = 'PasswordX';
            $usuario->rol = '1';
            $usuario->save();
                    //autenticarse
                    $response = $this->call('POST', '/login', [
                        'email' => $usuario->email,
                        'password' => $usuario->password,
                        '_token' => csrf_token()
                    ]);
                    //Crear Cliente
            $cliente = new User();
            $cliente->name = 'ClienteX';
            $cliente->apellido = 'ApellidoClienteX';
            $cliente->nit = '333-3';
            $cliente->email = '13@gmail.com';
            $cliente->password = 'PasswordX';
            $cliente->rol = '0';
            $cliente->save();
                    //Establecer respuesta correcta
            $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                    
            //Act (Actuar)
            
            $llamaVista=$this->call('POST', '/EditarCliente2/'.$cliente->id, [
                'nombres'=>'nombres',
                'apellidos'=>'apellidos',
                'nit'=>'77-7',
                'direnvio'=>'direnvio',
                'correo'=>'correo',
                'pass'=>'pass'
            ]);
            $respuestaFuncion=$llamaVista->getStatusCode();
            $usuario->delete();
            $cliente->delete();
            //Assert (Afirmar)
            $llamaVista->assertSeeText('Editar');
            $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
        
    
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Eliminar Cliente
    */
    public function testVistaEliminarCliente(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '14@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/EliminarCliente');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText('Eliminar');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Eliminar Cliente por ID
    */
    public function testVistaEliminarClienteID(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '15@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                //crear un cliente
        $cliente = new User();
        $cliente->name = 'ClienteX';
        $cliente->apellido = 'ApellidoClienteX';
        $cliente->nit = '333-3';
        $cliente->email = '16@gmail.com';
        $cliente->password = 'PasswordX';
        $cliente->rol = '0';
        $cliente->save();
        //Act (Actuar)
        $llamaVista=$this->get('/EliminarCliente/'.$cliente->id.'');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        $cliente->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText('No.');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Crear Producto
    */
    public function testVistaCrearProducto(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '17@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/CrearProducto');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText('Ingrese la información necesaria para crear un nuevo producto:');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista CrearProducto POST
    */
    public function testVistaCrearProductoPOST(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '18@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '0';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('CrearProductoPOST.jpg');
                //Establecer respuesta correcta
        $RescpuestaCorrecta='CrearProductoPOST';
        
        //Act (Actuar)
        $llamaVista=$this->call('POST', '/CrearProducto', [
            'cantidad'=>'10',
            'nombre'=>$RescpuestaCorrecta,
            'desc'=>'Descripcion de producto',
            'archivo'=>$file,
            'precio'=>'50'
        ]);
        $Producto=Producto::where('nombre','=',$RescpuestaCorrecta)->first();
        $respuestaFuncion=$Producto->nombre;
        $usuario->delete();
        $Producto->delete();
    
        //Assert (Afirmar)
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }



    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Editar producto
    */
    public function testVistaEditar(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '19@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '0';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();

        //Act (Actuar)
        $llamaVista=$this->get('/Editar');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $prod->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText('Editar');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }



    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Editar2 con id de produto 
    */
    public function testVistaEditar2IdProd(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '20@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/Editar2/'.$prod->id_producto);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        $prod->delete();

        //Assert (Afirmar)
        $llamaVista->assertSeeText('Ingrese la información necesaria para crear un nuevo producto:');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista CrearProducto POST
    */
    public function testVistaEditarProductoPOSTID(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '21@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '0';
        $usuario->save();
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
                Storage::fake('avatars');
                $file = UploadedFile::fake()->image('CrearProductoPOST.jpg');
                        //Establecer respuesta correcta
                $RescpuestaCorrecta=200;
                
                //Act (Actuar)
                //Act (Actuar)
        $llamaVista=$this->call('POST', '/Editar2/'.$prod->id_producto, [            
            'nombre'=>$RescpuestaCorrecta,
            'desc'=>'Descripcion de producto',
            'cantidad'=>'10',
            'archivo'=>$file,
            'float'=>'50'
        ]);
        
        $respuestaFuncion=$llamaVista->getStatusCode();
        $prod->delete();
        $usuario->delete();
            
                //Assert (Afirmar)
                $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);    
    }




            /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Editar2 con id de produto 
    */
    public function testVistaEliminar2IdProd(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '22@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/Eliminar/'.$prod->id_producto);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText('Id.');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Eliminar producto
    */
    public function testVistaEliminar(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '23@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '0';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();

        //Act (Actuar)
        $llamaVista=$this->get('/Eliminar');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        $prod->delete();
        //Assert (Afirmar)
        $llamaVista->assertSeeText('Eliminar');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista PerfilProducto
    */
    public function testPerfilProducto(){
        //Arrange (Preparar)
            //crear un usuario
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '24@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/PerfilProducto/'.$prod->id_producto);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $prod->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText($prod->nombre);
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }


        /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista CambiarEstadoFactura
    */
    public function testCambiarEstado(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '25@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
        $factura = new Factura();
        $factura->id_user=$usuario->id; 
        $factura->fecha='2018-09-24 02:02:02';
        $factura->estado='0';
        $factura->total = '150';
        $factura->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=302; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/CambiarEstado/1/'.$factura->id_factura);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $factura->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }


    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista EnviosAdmin
    */
    public function testEnviosAdmin(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '26@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/EnviosAdmin');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText('Estado de Envios');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Admin
    */
    public function testAdmin(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '27@gmail.com';
        $usuario->password = 'PasswordX';
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => $usuario->password,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=200; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/Admin');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText('Clientes');
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }



    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Carrito/FinalizarCompra
    */
    public function testCarritoFinalizarCompra(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '30@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '1';
        $usuario->save();
        $carrito = new Carrito();
        $carrito->id_user = $usuario->id;
        $carrito->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => '30@gmail.com',
                    'password' =>'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();
        $prodCarr= new Carrito_Producto();
        $prodCarr->id_carrito=$carrito->id_carrito;
        $prodCarr->id_producto=$prod->id_producto;
        $prodCarr->nombre_producto=$prod->nombre;
        $prodCarr->ruta_imagen=$prod->ruta_imagen;
        $prodCarr->cantidad=10;
        $prodCarr->precio=$prod->precio;
        $prodCarr->subtotal=$prod->precio*10;
        $prodCarr->save();

        $RespuestaCorrecta=302; //Codigo HTTP de respuesta correcta
        
        //Act (Actuar)
        $llamaVista=$this->get('Carrito/FinalizarCompra');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $prodCarr->delete();
        $prod->delete();
        $carrito->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }


    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Carrito/FinalizarCompra2
    */
    public function testCarritoFinalizarCompra2(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '30_2@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '1';
        $usuario->save();
        $carrito = new Carrito();
        $carrito->id_user = $usuario->id;
        $carrito->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' =>'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta

        $RespuestaCorrecta=302; //Codigo HTTP de respuesta correcta
        
        //Act (Actuar)
        $llamaVista=$this->get('Carrito/FinalizarCompra');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $carrito->delete();
        $usuario->delete();
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }








    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista ListarProductoCarrito
    */
    public function testCarritoListarProdcutoCarrito(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '33@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '0';
        $usuario->save();
        $carrito = new Carrito();
        $carrito->id_user = $usuario->id;
        $carrito->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' =>'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();
        $prodCarr= new Carrito_Producto();
        $prodCarr->id_carrito=$carrito->id_carrito;
        $prodCarr->id_producto=$prod->id_producto;
        $prodCarr->nombre_producto=$prod->nombre;
        $prodCarr->ruta_imagen=$prod->ruta_imagen;
        $prodCarr->cantidad=10;
        $prodCarr->precio=$prod->precio;
        $prodCarr->subtotal=$prod->precio*10;
        $prodCarr->save();

        $RespuestaCorrecta=200; //Codigo HTTP de respuesta correcta
        
        //Act (Actuar)
        $llamaVista=$this->get('/Carrito/ListarProductos');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $prodCarr->delete();
        $prod->delete();
        $carrito->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText('Carrito de Compras');
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }
    
    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista AgregarProductoCarrito
    */
    public function testCarritoAgregarProductoCarrito(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '32@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '0';
        $usuario->save();
        $carrito = new Carrito();
        $carrito->id_user = $usuario->id;
        $carrito->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' =>'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();

        $RespuestaCorrecta=302; //Codigo HTTP de respuesta correcta
        
        //Act (Actuar)
        $llamaVista=$this->call('POST','/Carrito/AgregarProducto/'.$prod->id_producto,
        [
            'cantidad'=>'5'
        ]);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $prodCarr=Carrito_Producto::where('id_producto','=',$prod->id_producto);
        $prodCarr->delete();
        $carrito->delete();
        $prod->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista AgregarProductoCarrito
    * Error si se desea comprar unidades mayor al stock del producto
    */
    public function testCarritoAgregarProductoCarrito2(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '32_2@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '0';
        $usuario->save();
        $carrito = new Carrito();
        $carrito->id_user = $usuario->id;
        $carrito->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' =>'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();

        $RespuestaCorrecta=302; //Codigo HTTP de respuesta correcta
        
        //Act (Actuar)
        $llamaVista=$this->call('POST','/Carrito/AgregarProducto/'.$prod->id_producto,
        [
            'cantidad'=>'150'
        ]);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $prodCarr=Carrito_Producto::where('id_producto','=',$prod->id_producto);
        $prodCarr->delete();
        $carrito->delete();
        $prod->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }


    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista AgregarProductoCarrito
    * Error si se desea agregar al carrito un producto que ya 
    * este agregado
    */
    public function testCarritoAgregarProductoCarrito3(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '32_3@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '0';
        $usuario->save();
        $carrito = new Carrito();
        $carrito->id_user = $usuario->id;
        $carrito->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' =>'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();
        $prodCarr= new Carrito_Producto();
        $prodCarr->id_carrito=$carrito->id_carrito;
        $prodCarr->id_producto=$prod->id_producto;
        $prodCarr->nombre_producto=$prod->nombre;
        $prodCarr->ruta_imagen=$prod->ruta_imagen;
        $prodCarr->cantidad=10;
        $prodCarr->precio=$prod->precio;
        $prodCarr->subtotal=$prod->precio*10;
        $prodCarr->save();

        $RespuestaCorrecta=302; //Codigo HTTP de respuesta correcta
        
        //Act (Actuar)
        $llamaVista=$this->call('POST','/Carrito/AgregarProducto/'.$prod->id_producto,
        [
            'cantidad'=>'150'
        ]);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $prodCarr->delete();
        $carrito->delete();
        $prod->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }


    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista EliminarProductoCarrito
    */
    public function testCarritoEliminarProductoCarrito(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '33@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '0';
        $usuario->save();
        $carrito = new Carrito();
        $carrito->id_user = $usuario->id;
        $carrito->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' =>'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();
        $prodCarr= new Carrito_Producto();
        $prodCarr->id_carrito=$carrito->id_carrito;
        $prodCarr->id_producto=$prod->id_producto;
        $prodCarr->nombre_producto=$prod->nombre;
        $prodCarr->ruta_imagen=$prod->ruta_imagen;
        $prodCarr->cantidad=10;
        $prodCarr->precio=$prod->precio;
        $prodCarr->subtotal=$prod->precio*10;
        $prodCarr->save();

        $RespuestaCorrecta=302; //Codigo HTTP de respuesta correcta
        
        //Act (Actuar)
        $llamaVista=$this->get('/Carrito/EliminarProducto/'.$prodCarr->id_carrito_producto);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $carrito->delete();
        $prod->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }


    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista ActualizarCantidad de un producto en el carrito
    */
    public function testCarritoActualizarCantidadCarrito(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '33@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '0';
        $usuario->save();
        $carrito = new Carrito();
        $carrito->id_user = $usuario->id;
        $carrito->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' =>'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();
        $prodCarr= new Carrito_Producto();
        $prodCarr->id_carrito=$carrito->id_carrito;
        $prodCarr->id_producto=$prod->id_producto;
        $prodCarr->nombre_producto=$prod->nombre;
        $prodCarr->ruta_imagen=$prod->ruta_imagen;
        $prodCarr->cantidad=10;
        $prodCarr->precio=$prod->precio;
        $prodCarr->subtotal=$prod->precio*10;
        $prodCarr->save();

        $RespuestaCorrecta=302; //Codigo HTTP de respuesta correcta
        
        //Act (Actuar)
        $llamaVista=$this->call('POST','/Carrito/ActualizarCantidad/'.$prodCarr->id_carrito_producto,
        [
            'cantidad'=>'5'
        ]);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $prodCarr->delete();
        $carrito->delete();
        $prod->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }


    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista ActualizarCantidad de un producto en el carrito
    * error porque se desea comprar un numero mayor al stock
    */
    public function testCarritoActualizarCantidadCarrito2(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '33@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '0';
        $usuario->save();
        $carrito = new Carrito();
        $carrito->id_user = $usuario->id;
        $carrito->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' =>'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();
        $prodCarr= new Carrito_Producto();
        $prodCarr->id_carrito=$carrito->id_carrito;
        $prodCarr->id_producto=$prod->id_producto;
        $prodCarr->nombre_producto=$prod->nombre;
        $prodCarr->ruta_imagen=$prod->ruta_imagen;
        $prodCarr->cantidad=10;
        $prodCarr->precio=$prod->precio;
        $prodCarr->subtotal=$prod->precio*10;
        $prodCarr->save();

        $RespuestaCorrecta=302; //Codigo HTTP de respuesta correcta
        
        //Act (Actuar)
        $llamaVista=$this->call('POST','/Carrito/ActualizarCantidad/'.$prodCarr->id_carrito_producto,
        [
            'cantidad'=>'150'
        ]);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $prodCarr->delete();
        $carrito->delete();
        $prod->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }





    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista carrito Vaciar
    */
    public function testVistaCarritoVaciar(){
        //Arrange (Preparar)
            //crear un usuario
            $usuario = new User();
            $usuario->name = 'NuevoX';
            $usuario->apellido = 'ApellidoX';
            $usuario->nit = '333-3';
            $usuario->email = '34@gmail.com';
            $usuario->password = Hash::make('PasswordX');
            $usuario->rol = '0';
            $usuario->no_items = '0';
            $usuario->direccion_envio='Ciudad';
            $usuario->save();
            $carrito = new Carrito();
            $carrito->id_user = $usuario->id;
            $carrito->save();
                    //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => '34@gmail.com',
                    'password' => 'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=302; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/Carrito/Vaciar');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $carrito->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }

/**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista /
    */
    public function testVistaInicio(){
        //Arrange (Preparar)
            //crear un usuario
            $usuario = new User();
            $usuario->name = 'NuevoX';
            $usuario->apellido = 'ApellidoX';
            $usuario->nit = '333-3';
            $usuario->email = '35@gmail.com';
            $usuario->password = 'PasswordX';
            $usuario->rol = '1';
            $usuario->save();
                    //autenticarse
                    $response = $this->call('POST', '/login', [
                        'email' => $usuario->email,
                        'password' => $usuario->password,
                        '_token' => csrf_token()
                    ]);
                    //Establecer respuesta correcta
            $RescpuestaCorrecta=302; //Codigo HTTP de respuesta correcta
                    
            //Act (Actuar)
            $llamaVista=$this->get('/');
            $respuestaFuncion=$llamaVista->getStatusCode();
            $usuario->delete();
            
            //Assert (Afirmar)
            $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
        }
       /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Carga Masiva
    */


    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Home
    */
    public function testHome(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '36@gmail.com';
        $usuario->password =  Hash::make('PasswordX');
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'password' => 'PasswordX',
                    'email' => $usuario->email,
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RescpuestaCorrecta=302; //Codigo HTTP de respuesta correcta
                
        //Act (Actuar)
        $llamaVista=$this->get('/home');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }


    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Eliminar producto de Facturas de Compra de 
    * Mercaderias
    */
    public function testEliminarProductoCompra(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '38@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => 'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $Control=new FacturaCompraController();
        $RespuestaCorrecta=302; //Codigo HTTP de respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();

        $Detalle=new Detalle_Compra();
        $Detalle->id_producto=$prod->id_producto;
        $Detalle->nombre_producto=$prod->nombre;
        $Detalle->cantidad=15;
        $Detalle->precio=200;
        $Detalle->subtotal=3000;
        $Detalle->save();



        //Act (Actuar)
        $llamaVista=$this->get('/ProveedorProducto/eliminar/'.$Detalle->id_detalle_compra);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $Detalle->delete();
        $prod->delete();
        $usuario->delete();
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Finalizar compra de Mercaderia
    */
    public function testFinalizarProductoCompra(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '39@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => 'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RespuestaCorrecta=302; //Codigo HTTP de respuesta correcta
        $Control=new FacturaCompraController();
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();

        $Detalle=new Detalle_Compra();
        $Detalle->id_producto=$prod->id_producto;
        $Detalle->nombre_producto=$prod->nombre;
        $Detalle->cantidad=15;
        $Detalle->precio=200;
        $Detalle->subtotal=3000;
        $Detalle->save();
        $Detalle=new Detalle_Compra();
        $Detalle->id_producto=$prod->id_producto;
        $Detalle->nombre_producto=$prod->nombre;
        $Detalle->cantidad=10;
        $Detalle->precio=200;
        $Detalle->subtotal=2000;
        $Detalle->save();

        //Act (Actuar)
        $llamaVista=$this->get('/ProveedorProducto/finalizar');
        $respuestaFuncion=$llamaVista->getStatusCode();        
        $prod->delete();
        $usuario->delete();
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }


    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista que inicio de Factura de Compra
    */
    public function testIndexProductoCompra(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '40@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => 'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $Control=new FacturaCompraController();
        $RespuestaCorrecta=200; //Codigo HTTP de respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();

        $Detalle=new Detalle_Compra();
        $Detalle->id_producto=$prod->id_producto;
        $Detalle->nombre_producto=$prod->nombre;
        $Detalle->cantidad=15;
        $Detalle->precio=200;
        $Detalle->subtotal=3000;
        $Detalle->save();



        //Act (Actuar)

        $llamaVista=$this->get('/ProveedorProducto');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $Detalle->delete();
        $prod->delete();
        $usuario->delete();
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }


    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Finalizar compra de Mercaderia
    */
    public function testGuardarProductoCompra(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '41@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '1';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => 'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RespuestaCorrecta=200; //Codigo HTTP de respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();


        //Act (Actuar)
        $llamaVista=$this->call('POST', '/ProveedorProducto', [
            'id_prod' => $prod->id_producto,
            'cantidad' => '15',
            'precio' => '200'
        ]);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $detalles = Detalle_Compra::where('id_producto','=',$prod->id_producto);
        $detalles->delete();
        $prod->delete();
        $usuario->delete();
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }



    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista ListarFacturasVentas
    */
    public function testListarFacturasVentas(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '42@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '0';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => 'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RespuestaCorrecta='200'; //Codigo HTTP de respuesta correcta
        //Act (Actuar)
        $llamaVista=$this->get('/Facturas/Listar');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista DetalleFacturasVentas
    */
    public function testDetalleFacturasVentas1(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '43@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '0';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => 'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $RespuestaCorrecta='302'; //Codigo HTTP de respuesta correcta
        //Act (Actuar)
        $llamaVista=$this->get('Facturas/DetalleFactura/0');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }


    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista DetalleFacturasVentas
    */
    public function testDetalleFacturasVentas2(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoX';
        $usuario->apellido = 'ApellidoX';
        $usuario->nit = '333-3';
        $usuario->email = '44@gmail.com';
        $usuario->password = Hash::make('PasswordX');
        $usuario->rol = '0';
        $usuario->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' => $usuario->email,
                    'password' => 'PasswordX',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta
        $prod = new Producto();
        $prod->nombre = 'ProductoXlp';
        $prod->descripcion='Producto de Prueba'; 
        $prod->cantidad_disponible='100';
        $prod->ruta_imagen='Db.jpg';
        $prod->precio = '150';
        $prod->save();

        $factura=new Factura();
        $factura->id_user=$usuario->id;
        $factura->fecha='2018-09-20 02:02:02';
        $factura->estado='0';
        $factura->total='1500';
        $factura->save();

        $prodFact= new Factura_Producto();
        $prodFact->id_factura=$factura->id_factura;
        $prodFact->id_producto=$prod->id_producto;
        $prodFact->nombre_producto=$prod->nombre;
        $prodFact->ruta_imagen=$prod->ruta_imagen;
        $prodFact->cantidad=10;
        $prodFact->precio=$prod->precio;
        $prodFact->subtotaliva=$prod->precio*10;
        $prodFact->subtotal=$prod->precio*10/1.12;
        $prodFact->iva=$prod->precio*10*0.12/1.12;
        $prodFact->save();

        $RespuestaCorrecta='200'; //Codigo HTTP de respuesta correcta
        //Act (Actuar)
        $llamaVista=$this->get('Facturas/DetalleFactura/'.$factura->id_factura);
        $respuestaFuncion=$llamaVista->getStatusCode();
        $prodFact->delete();
        $factura->delete();
        $prod->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }

}