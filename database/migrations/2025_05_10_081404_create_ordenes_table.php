<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id('ID_Orden');
            $table->date('Fecha');
            $table->decimal('Total', 10, 2);
            $table->unsignedBigInteger('ID_Cliente');
            $table->timestamps();

            $table->foreign('ID_Cliente')->references('ID_Cliente')->on('clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordenes');
    }
}
