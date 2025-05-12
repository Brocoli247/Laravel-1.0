<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialStockTable extends Migration
{
    public function up()
    {
        Schema::create('historial_stock', function (Blueprint $table) {
            $table->id('ID_Historial');
            $table->unsignedBigInteger('ID_Producto');
            $table->date('Fecha');
            $table->integer('Cantidad');
            $table->string('Motivo', 100)->nullable();
            $table->timestamps();

            $table->foreign('ID_Producto')->references('ID_Producto')->on('productos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_stock');
    }
}
