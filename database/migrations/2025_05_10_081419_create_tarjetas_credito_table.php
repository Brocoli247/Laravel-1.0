<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarjetasCreditoTable extends Migration
{
    public function up()
    {
        Schema::create('tarjetas_credito', function (Blueprint $table) {
            $table->id('ID_Tarjeta');
            $table->unsignedBigInteger('ID_Cliente');
            $table->string('Numero_Tarjeta', 255);
            $table->date('Fecha_Expiracion');
            $table->string('CVV', 255);
            $table->string('Tipo_Tarjeta', 50);
            $table->timestamps();

            $table->foreign('ID_Cliente')->references('ID_Cliente')->on('clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tarjetas_credito');
    }
}