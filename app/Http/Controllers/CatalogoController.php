<?php

namespace App\Http\Controllers;
use App\producto;
use Illuminate\Http\Request;
use DB;
use Auth;

class CatalogoController extends Controller
{
    public function Catalogo()
    {
        $Catalogo=DB::table('producto as P')
        ->where('P.cantidad_disponible', '>',0)->get();
        /**
         * retorno de la vista de grupos a los que pertenece el usuario
         * */        
        return view('Catalogo')
        ->with("catalogo",$Catalogo)
        ->with("contador",0);
    } 
    public function PerfilProducto($idproducto)
    {
        $producto=DB::table('producto as P')
        ->where('P.id_producto', '=',$idproducto)->first();
        /**
         * retorno de la vista de grupos a los que pertenece el usuario
         * */        
        return view('PerfilProducto')
        ->with("producto",$producto);
    } 
}
