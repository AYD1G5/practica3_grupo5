<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//CREACION DEL MODELO CARRITO_PRODUCTO
class Carrito_Producto extends Model
{
    protected $table = 'carrito_producto';

    protected $primaryKey='id_carrito_producto';

}
