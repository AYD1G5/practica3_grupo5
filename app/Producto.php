<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//CREACION DEL MODELO PRODUCTO
class Producto extends Model
{
    protected $primaryKey = 'id_producto';
    protected $table = 'producto';

}
