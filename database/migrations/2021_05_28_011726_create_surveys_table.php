<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('question');
            $table->enum('type', ['likert', 'semantic', 'advertisement'])->unique();
            // bu highlimit dinamik tutulup frontendde bu limite göre high low diye etiketlenebilir.
            $table->integer('high_limit');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surveys');
    }
}
