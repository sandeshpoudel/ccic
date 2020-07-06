<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->unsigned();
			//$table->integer('fiscal_id')->unsigned();
//            $table->string('type');
            $table->date('date');
            $table->date('duedate');
            $table->string('status');
            $table->string('total')->nullable();
            $table->string('fine')->nullable();
            $table->string('discount')->nullable();
            $table->string('paidamount')->nullable();
            $table->string('method');
            $table->string('reference')->nullable();
            $table->text('remarks')->nullable();
			$table->string('paymentby');
			
//            $table->date('itemdue');
            $table->timestamps();

            $table->foreign('member_id')
                ->references('id')
                ->on('members')
                ->onDelete('cascade');
				
//				$table->foreign('fiscal_id')
//                ->references('id')
//                ->on('fiscals')
//                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
