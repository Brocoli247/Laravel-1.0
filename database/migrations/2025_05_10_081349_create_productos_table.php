<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('ID_Producto'); // Define correctamente la clave primaria
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 10, 2);
$table->string('imagen_url')->nullable();
            $table->integer('cantidad');
            $table->unsignedBigInteger('ID_Categoria'); // Ajuste para clave foránea manual
            $table->unsignedBigInteger('ID_Proveedor'); // Ajuste para clave foránea manual
            $table->timestamps();

            // Definir claves foráneas correctamente
            $table->foreign('ID_Categoria')->references('ID_Categoria')->on('categorias_productos')->onDelete('cascade');
            $table->foreign('ID_Proveedor')->references('ID_Proveedor')->on('proveedores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}