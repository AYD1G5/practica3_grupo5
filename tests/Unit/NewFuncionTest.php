<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Http\Controllers\NewFuncionController;
use App\User;
use Auth;
use App\Carrito;
use Illuminate\Support\Facades\Hash;

class NewFuncionTest extends TestCase
{

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Carrito/FinalizarCompra
    */
    public function testCarritoFinalizarCompra(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoNF';
        $usuario->apellido = 'ApellidoNF';
        $usuario->nit = '333-3NF';
        $usuario->email = '1NF@gmail.com';
        $usuario->password = Hash::make('PasswordNF');
        $usuario->rol = '1';
        $usuario->save();
        $carrito = new Carrito();
        $carrito->id_user = $usuario->id;
        $carrito->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' =>  $usuario->email,
                    'password' =>'PasswordNF',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta

        $RespuestaCorrecta=200; //Codigo HTTP de respuesta correcta
        
        //Act (Actuar)
        $llamaVista=$this->get('Carrito/FinalizarCompra');
        $respuestaFuncion=$llamaVista->getStatusCode();
        $carrito->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
    }

    /**Evaluar la respuesta del metodo del controlador que 
    * devulve la vista Carrito/FinalizarCompra
    */
    public function testCarritoFinalizarCompraTexto(){
        //Arrange (Preparar)
            //crear un usuario
        $usuario = new User();
        $usuario->name = 'NuevoNF';
        $usuario->apellido = 'ApellidoNF';
        $usuario->nit = '333-3NF';
        $usuario->email = '1NF@gmail.com';
        $usuario->password = Hash::make('PasswordNF');
        $usuario->rol = '1';
        $usuario->save();
        $carrito = new Carrito();
        $carrito->id_user = $usuario->id;
        $carrito->save();
                //autenticarse
                $response = $this->call('POST', '/login', [
                    'email' =>  $usuario->email,
                    'password' =>'PasswordNF',
                    '_token' => csrf_token()
                ]);
                //Establecer respuesta correcta

        $RespuestaCorrecta='Pago en Efectivo'; //Codigo HTTP de respuesta correcta
        
        //Act (Actuar)
        $llamaVista=$this->get('Carrito/FinalizarCompra');
        
        $carrito->delete();
        $usuario->delete();
        
        //Assert (Afirmar)
        $llamaVista->assertSeeText($RespuestaCorrecta);
    }

    /**
    * Prueba para la funcion  vuelto
    */
    public function testCalcularVuelto()
    {
        //Arrange (Preparar)
        $newFuncionController=new NewFuncionController();
        $total=50;
        $pagar=100;

        //Act (Actuar)
        $respuestaFuncion=$newFuncionController->vuelto($total,$pagar);
        $RespuestaCorrecta=$pagar-$total;
        
        //Assert (Afirmar)
        $this->assertEquals($RespuestaCorrecta,$respuestaFuncion);
        
    }


}
