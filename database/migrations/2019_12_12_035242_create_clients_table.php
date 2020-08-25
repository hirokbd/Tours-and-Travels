<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('agent_id')->unsigned()->default('1');
            $table->string('email');
            $table->string('phone');
            $table->string('phone2');
            $table->string('address');
            $table->integer('district_id')->unsigned();
            $table->integer('upazila_id')->unsigned();
            $table->string('client_photo');
            $table->string('passport_no');
            $table->string('birth_date');
            $table->string('passport_expired');
            $table->string('passport_issue');
            $table->string('em_name');
            $table->string('em_email');
            $table->string('em_phone');
            $table->string('em_insurance');
            $table->string('em_insurance_no');
            $table->string('em_company_phone');
            $table->integer('status')->default('1')->comment('Active=1, Inactive=0');
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
        Schema::dropIfExists('clients');
    }
}
