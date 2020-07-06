<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fiscal_id')->unsigned();
            $table->integer('membershiptype_id')->unsigned();
            $table->string('capitalfrom');
            $table->string('capitalto');
            $table->string('entry');
            $table->string('annual');
            $table->string('renew');
            $table->timestamps();

            $table->foreign('fiscal_id')
                ->references('id')
                ->on('fiscals')
                ->onDelete('cascade');

            $table->foreign('membershiptype_id')
                ->references('id')
                ->on('membershiptypes')
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
        Schema::dropIfExists('fees');
    }
}
