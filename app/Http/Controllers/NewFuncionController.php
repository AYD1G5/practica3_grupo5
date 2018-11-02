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
