<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToNoticiasTable extends Migration
{
    public function up()
    {
        Schema::table('noticias', function (Blueprint $table) {
            if (!Schema::hasColumn('noticias', 'imagen')) {
                $table->string('imagen')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('noticias', function (Blueprint $table) {
            if (Schema::hasColumn('noticias', 'imagen')) {
                $table->dropColumn('imagen');
            }
        });
    }
}

