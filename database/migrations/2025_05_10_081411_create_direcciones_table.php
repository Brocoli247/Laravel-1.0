<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id('ID_Direccion');
            $table->unsignedBigInteger('ID_Cliente');
            $table->string('Estado', 50)->nullable();
            $table->string('Municipio', 50)->nullable();
            $table->string('Colonia', 50)->nullable();
            $table->string('Calle', 100)->nullable();
            $table->string('Numero_Ext', 10)->nullable();
            $table->string('Numero_Int', 10)->nullable();
            $table->string('Codigo_Postal', 10)->nullable();
            $table->timestamps();

            $table->foreign('ID_Cliente')->references('ID_Cliente')->on('clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}