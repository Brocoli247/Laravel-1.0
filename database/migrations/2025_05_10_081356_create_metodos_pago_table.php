<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetodosPagoTable extends Migration
{
    public function up()
    {
        Schema::create('metodos_pago', function (Blueprint $table) {
            $table->id('ID_MetodoPago');
            $table->string('Tipo_Metodo', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('metodos_pago');
    }
}