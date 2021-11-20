<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolFinancialFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_financial_faq', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('school_id');
            $table->text('question');
            $table->text('answer');
            $table->integer('orders');
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
        Schema::dropIfExists('school_financial_faq');
    }
}
