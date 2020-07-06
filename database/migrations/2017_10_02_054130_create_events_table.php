<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fiscal_id')->unsigned();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('nepali');
            $table->date('start');
            $table->date('end');
            $table->timestamps();

            $table->foreign('fiscal_id')
                ->references('id')
                ->on('fiscals')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
