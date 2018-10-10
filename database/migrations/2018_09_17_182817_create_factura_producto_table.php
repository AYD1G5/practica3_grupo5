<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_producto', function (Blueprint $table) {
            $table->increments('id_factura_producto');
            $table->integer('id_factura')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->text('nombre_producto')->nullable();
            $table->string('ruta_imagen')->nullable();
            $table->integer('cantidad')->unsigned()->nullable();
            $table->float('precio')->unsigned()->nullable();
            $table->float('iva')->unsigned()->nullable();
            $table->float('subtotal')->unsigned()->nullable();
            $table->float('subtotaliva')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_producto');
    }
}
