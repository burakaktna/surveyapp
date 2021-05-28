<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Class CreateFactorAdvertisementsTable extends Migration {
    public function up()
    {
        Schema::create('factor_advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('factor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('advertisement_id')->constrained()->cascadeOnDelete();

            $table->unique(['factor_id', 'advertisement_id']);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('factor_advertisements');
    }
};
