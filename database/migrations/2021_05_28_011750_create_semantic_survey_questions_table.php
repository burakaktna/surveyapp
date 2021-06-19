<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemanticSurveyQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('semantic_survey_questions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('semantic_survey_id')->constrained('surveys')->cascadeOnDelete();

            $table->string('question_begin');
            $table->string('question_end');
            $table->boolean('is_reversed');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('semantic_survey_questions');
    }
}
