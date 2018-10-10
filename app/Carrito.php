<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//CREACION DEL MODELO CARRITO
class Carrito extends Model
{
    protected $table = 'carrito';

    protected $primaryKey='id_carrito';
}
