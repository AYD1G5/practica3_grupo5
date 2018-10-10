<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//CREACION DEL MODELO FACTURA_PRODUCTO
class Factura_Producto extends Model
{
    protected $table = 'factura_producto';

    protected $primaryKey='id_factura_producto';
}
