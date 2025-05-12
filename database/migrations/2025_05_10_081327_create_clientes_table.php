<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('ID_Cliente');
            $table->string('Nombre', 50);
            $table->string('Correo_Electronico', 100)->unique();
            $table->string('password');
            $table->string('Telefono', 15)->nullable();
            $table->string('Apellido_Paterno', 50)->nullable();
            $table->string('Apellido_Materno', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}