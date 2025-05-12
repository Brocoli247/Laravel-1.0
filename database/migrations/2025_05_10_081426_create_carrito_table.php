<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoTable extends Migration
{
    public function up()
    {
        Schema::create('carrito', function (Blueprint $table) {
            $table->id('ID_Carrito');
            $table->unsignedBigInteger('ID_Cliente');
            $table->unsignedBigInteger('ID_Producto');
            $table->integer('Cantidad');
            $table->timestamps();

            $table->foreign('ID_Cliente')->references('ID_Cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('ID_Producto')->references('ID_Producto')->on('productos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carrito');
    }
}
