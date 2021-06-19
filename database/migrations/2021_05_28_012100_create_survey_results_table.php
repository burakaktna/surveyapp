<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Class CreateSurveyResultsTable extends Migration {
    public function up()
    {
        Schema::create('survey_results', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('participant_id')->constrained()->cascadeOnDelete();

            $table->foreignId('survey_id')->constrained()->cascadeOnDelete();
            $table->double('average_point', 1, 3);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('survey_results');
    }
};
