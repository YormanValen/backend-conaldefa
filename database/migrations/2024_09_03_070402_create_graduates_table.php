<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduates', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->nullable();
            $table->date('fecha_expedicion');
            $table->string('nombre');
            $table->integer('identificacion')->unique();
            $table->string('resolucion');
            $table->string('universidad');
            $table->string('correo');
            $table->date('fecha_pago_realizado')->nullable();
            $table->string('telefono')->nullable();
            $table->boolean('verificado')->default(false); // nuevo campo booleano
            $table->decimal('valor', 8, 2); // campo para el valor
            $table->boolean('recibido_tarjeta')->default(false); // nuevo campo booleano
            $table->boolean('colegiado')->default(false); // nuevo campo booleano
            $table->boolean('matriculado')->default(false); // nuevo campo booleano
            $table->boolean('acta_grado')->default(false); // nuevo campo booleano
            $table->boolean('acta_afiliacion')->default(false); // nuevo campo booleano
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graduates');
    }
};
