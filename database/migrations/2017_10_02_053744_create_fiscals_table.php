<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiscalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiscals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->date('durationFromBs');
            $table->date('durationFromAd');
            $table->date('durationToBs');
            $table->date('durationToAd');
            $table->string('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiscals');
    }
}
