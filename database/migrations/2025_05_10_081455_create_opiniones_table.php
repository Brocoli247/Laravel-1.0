<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpinionesTable extends Migration
{
    public function up()
    {
        Schema::create('opiniones', function (Blueprint $table) {
            $table->id('ID_Resenia');
            $table->unsignedBigInteger('ID_Producto');
            $table->unsignedBigInteger('ID_Cliente');
            $table->integer('Calificacion')->check('Calificacion >= 1 AND Calificacion <= 5');
            $table->text('Comentario')->nullable();
            $table->date('Fecha_Resena');
            $table->timestamps();

            $table->foreign('ID_Producto')->references('ID_Producto')->on('productos')->onDelete('cascade');
            $table->foreign('ID_Cliente')->references('ID_Cliente')->on('clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('opiniones');
    }
}