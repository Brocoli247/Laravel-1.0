<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesOrdenesTable extends Migration
{
    public function up()
    {
        Schema::create('detalles_ordenes', function (Blueprint $table) {
            $table->id('ID_Detalle');
            $table->unsignedBigInteger('ID_Orden');
            $table->unsignedBigInteger('ID_Producto');
            $table->integer('Cantidad');
            $table->decimal('Subtotal', 10, 2);
            $table->timestamps();

            $table->foreign('ID_Orden')->references('ID_Orden')->on('ordenes')->onDelete('cascade');
            $table->foreign('ID_Producto')->references('ID_Producto')->on('productos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalles_ordenes');
    }
}