<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPdfFileToResolutionsTable extends Migration
{
    public function up()
    {
        Schema::table('resolutions', function (Blueprint $table) {
            $table->string('pdf_file')->nullable();
        });
    }

    public function down()
    {
        Schema::table('resolutions', function (Blueprint $table) {
            $table->dropColumn('pdf_file');
        });
    }
}

