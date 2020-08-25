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
            $table->bigIncrements('id');
            $table->string('invoice_no');
            $table->date('invoice_date');
            $table->integer('client_id')->unsigned();
            $table->integer('agent_id')->unsigned();
            $table->integer('regi_type')->default('1')->comment('Registration=1, Pre-registration=0');
            $table->integer('year')->nullable();
            $table->integer('country_id')->unsigned();
            $table->integer('visa_type')->unsigned();
            $table->integer('payment_type')->unsigned();
            $table->integer('bank_id')->unsigned();
            $table->string('cheque_no')->nullable();
            $table->integer('sub_total');
            $table->integer('discount_percent');
            $table->integer('grand_total');
            $table->integer('paid_amount');
            $table->integer('due_amount');
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
        Schema::dropIfExists('invoices');
    }
}
