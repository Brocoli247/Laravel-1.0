<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->bigIncrements('ID_Proveedor'); // Define correctamente la clave primaria
            $table->string('Nombre_Proveedor', 100);
            $table->string('Contacto', 50)->nullable();
            $table->text('Direccion')->nullable();
            $table->string('Correo_Electronico')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
