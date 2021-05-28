<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactorResultsTable extends Migration
{
    public function up()
    {
        Schema::create('factor_results', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('factor_id')->constrained()->cascadeOnDelete();
            $table->enum('tag', ['high', 'low']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('factor_answers');
    }
}
