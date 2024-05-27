<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResolutionsTable extends Migration
{
    public function up()
    {
        Schema::create('resolutions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->date('resolution_date');
            $table->timestamps();  // Esto agrega las columnas created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('resolutions');
    }
}

