<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisaAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_apps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_id')->unsigned();
            $table->integer('visa_type')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->string('visa_duration');
            $table->string('visa_duration_type');
            $table->string('app_date')->nullable();
            $table->string('processing_time')->nullable();
            $table->string('down_payment')->nullable();
            $table->integer('down_payment_type')->unsigned()->nullable();
            $table->string('app_fee')->nullable();
            $table->integer('app_fee_type')->unsigned()->nullable();
            $table->string('document')->nullable();
            $table->text('remarks')->nullable();
            $table->integer('status')->default('1')->comment('New=1, Pending=0, Approved=2, Rejected=3');
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
        Schema::dropIfExists('visa_apps');
    }
}
