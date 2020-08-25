<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ex_name');
            $table->text('ex_desc');
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
        Schema::dropIfExists('expense_names');
    }
}
