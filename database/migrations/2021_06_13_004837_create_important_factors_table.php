<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportantFactorsTable extends Migration
{
    public function up()
    {
        Schema::create('important_factors', function (Blueprint $table) {
            $table->bigIncrements('id');

            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('important_factors');
    }
}
