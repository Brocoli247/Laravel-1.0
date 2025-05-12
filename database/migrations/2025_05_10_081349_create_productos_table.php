<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('ID_Producto');
            $table->string('Nombre_Producto', 100);
            $table->text('Descripcion')->nullable();
            $table->decimal('Precio', 10, 2);
            $table->integer('Stock');
            $table->unsignedBigInteger('ID_Categoria');
            $table->unsignedBigInteger('ID_Proveedor');
            $table->timestamps();

            $table->foreign('ID_Categoria')->references('ID_Categoria')->on('categorias_productos')->onDelete('cascade');
            $table->foreign('ID_Proveedor')->references('ID_Proveedor')->on('proveedores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}