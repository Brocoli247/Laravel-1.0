<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocionesTable extends Migration
{
    public function up()
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table->id('ID_Promocion');
            $table->string('Nombre_Promocion', 100)->nullable();
            $table->decimal('Descuento', 5, 2);
            $table->date('Fecha_Inicio');
            $table->date('Fecha_Fin');
            $table->unsignedBigInteger('ID_Producto')->nullable();
            $table->unsignedBigInteger('ID_Categoria')->nullable();
            $table->timestamps();

            $table->foreign('ID_Producto')->references('ID_Producto')->on('productos')->onDelete('cascade');
            $table->foreign('ID_Categoria')->references('ID_Categoria')->on('categorias_productos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('promociones');
    }
}