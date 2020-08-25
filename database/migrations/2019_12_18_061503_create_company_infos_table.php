<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('tagline');
            $table->text('description');
            $table->string('email');
            $table->string('email2');
            $table->string('phone');
            $table->string('phone2');
            $table->string('logo');
            $table->string('address');
            $table->string('website');
            $table->string('start_date');
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
        Schema::dropIfExists('company_infos');
    }
}
