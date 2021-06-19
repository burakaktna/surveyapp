<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdViewsTable extends Migration
{
    public function up(): void
    {
        Schema::create('ad_views', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('participant_id')->unique()->constrained()->cascadeOnDelete();
            $table->foreignId('advertisement_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ad_views');
    }
}
