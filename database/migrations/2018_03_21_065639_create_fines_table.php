<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fiscal_id')->unsigned();
            $table->date('startbs');
            $table->date('startad');
            $table->date('endbs');
            $table->date('endad');
            $table->string('fine');
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
        Schema::dropIfExists('fines');
    }
}
