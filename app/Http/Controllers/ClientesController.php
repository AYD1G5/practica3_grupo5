<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect; //---> Sirve para poder utilizar los modelos
use Illuminate\Support\Facades\Hash; //---> Sirve para poder utilizar los modelos

class ClientesController extends Controller
{

    public function CrearCliente(Request $request){
      $user = User::where('email', '=', $request->correo)->first();
    if ($user === null) {
      $usuario = new User();
      $usuario->name = $request->nombres;
      $usuario->apellido = $request->apellidos;
      $usuario->nit = $request->nit;
      $usuario->direccion_envio = $request->direnvio;
      $usuario->email = $request->correo;
      $usuario->password = Hash::make($request->pass);
      $usuario->rol = 1;
      $usuario->save();
      $usuarios = User::all();
      return view('CRUDClientes.EditarCliente')->with('usuarios', $usuarios);
    }else{
      return "El correo ". $request->correo . " se ha registrado con otra cuenta.";
    }
    }

    public function MostrarFormCrearCliente(){
      return view('CRUDClientes.CrearCliente');
    }

    public function MostrarFormClientes(){
      $usuarios = User::all();
      return view('CRUDClientes.EditarCliente')->with('usuarios', $usuarios);
    }

    public function MostrarFormaParaEditarClientes($idUsuario){
      $usuario = User::where(array(
        'id' => $idUsuario
      ))->first();
      return view('CRUDClientes.EditarCliente2')->with('usuario', $usuario);
    }

    public function ActualizarCliente(Request $request, $idUsuario){
            $usuarios =User::find($idUsuario);
            $usuarios->name = $request->nombres;
            $usuarios->apellido = $request->apellidos;
            $usuarios->nit = $request->nit;
            $usuarios->direccion_envio = $request->direnvio;
            $usuarios->email = $request->correo;
            $usuarios->password = $request->pass;
            $usuarios->rol = 1;
            $usuarios->save();
            $us = User::all();
                return view('CRUDClientes.EditarCliente')->with('usuarios', $us);
    }

    public function EliminarClientes(){
      $usuarios = User::all();
      return view('CRUDClientes.EliminarCliente')->with('usuarios', $usuarios);
    }

    public function EliminarClientes2($idUsuario){
            $usuario = User::where(array(
              'id' => $idUsuario
            ))->first();
            $usuario->delete();
      $usuarios = User::all();
      return view('CRUDClientes.EditarCliente')->with('usuarios', $usuarios);
    }


}
