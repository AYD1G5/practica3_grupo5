<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Carrito;
class CreateCarritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito', function (Blueprint $table) {
            $table->increments('id_carrito');
            $table->integer('id_user')->unsigned();
            $table->timestamps();
        });
        $salida = User::create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make("12345678"),
            'apellido' => "Admin",
            'nit' => "12345678",
            'direccion_envio' => "12345678",
            'rol' => '1',
            'no_items' => '0'
        ]);
        $carrito = new Carrito();
        $carrito->id_user = $salida->id;
        $carrito->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrito');
    }
}
