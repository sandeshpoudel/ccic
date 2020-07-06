<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceitems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->integer('invoiceable_id')->unsigned();
            $table->integer('fiscal_id')->unsigned();
            $table->text('description')->nullable();
            $table->date('itemdue');
            $table->integer('member_id')->unsigned();
            $table->string('amount');
            $table->timestamps();

            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade');

            $table->foreign('invoiceable_id')
                ->references('id')
                ->on('invoiceables')
                ->onDelete('cascade');

            $table->foreign('fiscal_id')
                ->references('id')
                ->on('fiscals')
                ->onDelete('cascade');

            $table->foreign('member_id')
                ->references('id')
                ->on('members')
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
        Schema::dropIfExists('invoiceitem');
    }
}
