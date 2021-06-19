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

            $table->foreignId('participant_id')->constrained()->cascadeOnDelete();

            $table->foreignId('factor_id')->constrained()->cascadeOnDelete();
            $table->double('average_point', 3, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('factor_answers');
    }
}
