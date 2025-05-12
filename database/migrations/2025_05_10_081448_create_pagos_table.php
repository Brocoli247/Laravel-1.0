<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('ID_Pago');
            $table->unsignedBigInteger('ID_Orden');
            $table->unsignedBigInteger('ID_MetodoPago');
            $table->date('Fecha_Pago');
            $table->decimal('Monto', 10, 2);
            $table->timestamps();

            $table->foreign('ID_Orden')->references('ID_Orden')->on('ordenes')->onDelete('cascade');
            $table->foreign('ID_MetodoPago')->references('ID_MetodoPago')->on('metodos_pago')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}