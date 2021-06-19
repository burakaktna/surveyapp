<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementSurveyQuestionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('advertisement_survey_questions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('advertisement_survey_id')->constrained('surveys')->cascadeOnDelete();

            $table->string('question_begin');
            $table->string('question_end');
            $table->boolean('is_reversed');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('advertisement_survey_questions');
    }
}
