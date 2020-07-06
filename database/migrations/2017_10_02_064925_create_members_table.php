<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
//            below will be foreign entries
            $table->integer('location_id')->unsigned();
            $table->integer('membershiptype_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('membershipstatus_id')->unsigned();
            //$table->integer('nature_id')->unsigned();

//             below will be the columns of table.
            $table->string('name');
            $table->string('details');
            $table->string('capital');
            $table->string('ward');
            $table->string('chowk');
            $table->string('tole')->nullable();
            $table->date('startDate');
            $table->date('approvalDate')->nullable();
            $table->string('phone');
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('membershipNumber')->nullable();
            $table->integer('ownershiptype_id')->unsigned();

//              below will be the details of propritor
            $table->string('proprietorName');
			$table->string('nature');
            $table->string('proprietorPhone');
            $table->string('proprietorMobile');
            $table->string('gender');
            $table->string('citizenship');
            $table->string('landlord')->nullable();
            $table->text('charkilla');
//            Misc Details Goes Here


            $table->string('applicantName');
            $table->string('applicationRelation');
            $table->date('applicationDate');
            $table->date('nepalistartdate');
            $table->string('renewalfailedsince')->nullable();
            $table->timestamps();

//            describe foreign relationship here
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');

            $table->foreign('membershiptype_id')
                ->references('id')
                ->on('membershiptypes')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('membershipstatus_id')
                ->references('id')
                ->on('membershipstatuses')
                ->onDelete('cascade');

            $table->foreign('ownershiptype_id')
                ->references('id')
                ->on('ownershiptypes')
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
        Schema::dropIfExists('members');
    }
}
