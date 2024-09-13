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
            $table->string('nombre_y_apellidos');
            $table->string('cedula')->unique();
            $table->string('graduado')->nullable();
            $table->boolean('matriculado')->default(false); // nuevo campo booleano
            $table->boolean('colegiado')->default(false)->nullable(); // nuevo campo booleano
            $table->date('vigencia')->nullable();
            $table->string('vigencia_certificado')->nullable();
            $table->string('antecedentes');
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
