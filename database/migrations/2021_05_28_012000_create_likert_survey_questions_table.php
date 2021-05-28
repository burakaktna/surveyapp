<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikertSurveyQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('likert_survey_questions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('likert_survey_id')->constrained('surveys')->cascadeOnDelete();

            $table->text('question');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('likert_survey_questions');
    }
}
