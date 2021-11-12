<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_scholarships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('school_id')->nullable();
            $table->text('name');
            // $table->text('provider');
            $table->text('summary');
            // $table->text('amount');
            $table->text('eligibility');
            $table->text('award');
            $table->text('action');
            $table->text('deadline');
            $table->text('availability');
            $table->text('level_of_study');
            // $table->text('school_name');
            $table->text('image');
            $table->text('link');
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
        Schema::dropIfExists('school_scholarships');
    }
}
