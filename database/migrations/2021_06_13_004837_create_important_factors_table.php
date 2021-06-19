<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportantFactorsTable extends Migration
{
    public function up(): void
    {
        Schema::create('important_factors', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('factor_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('important_factors');
    }
}
