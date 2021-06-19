<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Class CreateQuestionAnswersTable extends Migration {
    public function up()
    {
        Schema::create('question_answers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('participant_id')->constrained()->cascadeOnDelete();

            $table->morphs('questionable');
            $table->integer('point');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_answers');
    }
};
