<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller\NewFuncionController;
use App\Pago;
use App\User;
use Auth;


class NewFuncionTest extends TestCase
{
    /**
     * Prueba creada para probar si esta retornando correctamente la vista \NewFuncion
     */
    public function testNewFuncion(){
             //Arrange (Preparar)
            //crear un usuario
            $usuario = new User();
            $usuario->name = 'NuevoXF';
            $usuario->apellido = 'ApellidoXF';
            $usuario->nit = '333-3F';
            $usuario->email = '1F@gmail.com';
            $usuario->password = 'PasswordXF';
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
            $llamaVista=$this->get('/NewFuncion');
            $respuestaFuncion=$llamaVista->getStatusCode();
            $usuario->delete();
            
            //Assert (Afirmar)
            $llamaVista->assertSeeText('Nuevo Archivo');
            $this->assertEquals($RescpuestaCorrecta,$respuestaFuncion);
    }
    /**
     * Prueba creada para probar si esta retornando correctamente la vista \NewFuncion
     */
    public function testNewFuncion2(){
        //Arrange (Preparar)
       //crear un usuario
       $usuario = new User();
       $usuario->name = 'NuevoXF';
       $usuario->apellido = 'ApellidoXF';
       $usuario->nit = '333-3F';
       $usuario->email = '1F@gmail.com';
       $usuario->password = 'PasswordXF';
       $usuario->rol = '1';
       $usuario->save();
               //autenticarse
               $response = $this->call('POST', '/login', [
                   'email' => $usuario->email,
                   'password' => $usuario->password,
                   '_token' => csrf_token()
               ]);
               //Establecer respuesta correcta
       $RespuestaCorrecta="Nueva Funcion";
               
       //Act (Actuar)
       $llamaVista=$this->get('/NewFuncion');
       $respuestaFuncion=$llamaVista->getStatusCode();
       $usuario->delete();
       
       //Assert (Afirmar)
       $llamaVista->assertSeeText($RescpuestaCorrecta);

}

}
