<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasProductosTable extends Migration
{
    public function up()
    {
        Schema::create('categorias_productos', function (Blueprint $table) {
            $table->id('ID_Categoria');
            $table->string('Nombre_Categoria', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorias_productos');
    }
}