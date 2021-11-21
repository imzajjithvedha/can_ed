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
            $table->text('summary');
            $table->text('eligibility');
            $table->text('award');
            $table->text('action');
            $table->date('deadline');
            $table->text('availability');
            $table->text('level_of_study');
            $table->text('image');
            $table->text('link');
            $table->text('featured');
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
