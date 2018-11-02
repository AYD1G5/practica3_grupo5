<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewFuncionController extends Controller
{
    //este metodo lo utilizaremos para realizar la logica de New funcion
    public function NewFuncion()
    {
        //    return view('CrearGrupo.CrearGrupo');

    }
    public function realizarpago()
    {
        $carrito_usuario=$this->carritoUsuario();
        $productoscarrito=DB::table('carrito_producto as cp')
        ->where('cp.id_carrito', '=', $carrito_usuario->id_carrito)
        ->get();     
        $total = 0;
        foreach($productoscarrito as $pcar){
                $pcar->subtotal = $subtotal = $this->func->calcularSubTotal($pcar->cantidad, $pcar->precio);    
                $total = $total + $pcar->subtotal;
            
        }
        return view('Realizar_pago', ["total"=>$total]);
    }
    public function vuelto($total,$pagar)
    {

        if($pagar<$total)
        {
            return "-1";
        }
        else
        {
            return $pagar-$total;
        }
    }
}
