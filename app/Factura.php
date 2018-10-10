<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//CREACION DEL MODELO FACTURA
class Factura extends Model
{
    protected $table = 'factura';

    protected $primaryKey='id_factura';
}
