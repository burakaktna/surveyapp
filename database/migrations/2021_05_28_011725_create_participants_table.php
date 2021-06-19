<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
}
