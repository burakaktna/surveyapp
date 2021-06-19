<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementSurveyQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('advertisement_survey_questions', function (Blueprint $table) {
            $table->bigIncrements('id');

            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('advertisement_survey_questions');
    }
}
