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
            $table->text('school_name')->nullable();
            $table->text('province')->nullable();
            $table->text('name');
            $table->text('award');
            $table->text('summary')->nullable();
            $table->text('amount')->nullable();
            $table->text('eligibility')->nullable();
            $table->text('action');
            $table->text('date_posted')->nullable();
            $table->text('expiry_date')->nullable();
            $table->text('deadline')->nullable();
            $table->text('availability');
            $table->text('level_of_study');
            $table->text('duration');
            $table->text('more_info')->nullable();
            $table->text('link')->nullable();
            $table->text('image')->nullable();
            $table->text('featured')->nullable();
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
