<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Class CreateFactorQuestionsTable extends Migration {
    public function up()
    {
        Schema::create('factor_questions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('factor_id')->constrained()->cascadeOnDelete();

            $table->foreignId('likert_survey_question_id')->constrained()->cascadeOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('factor_questions');
    }
};
