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
            $table->text('name');
            $table->text('provider')->nullable();
            $table->text('summary');
            $table->text('amount')->nullable();
            $table->text('school_id')->nullable();
            $table->text('eligibility');
            $table->text('province');
            $table->text('award');
            $table->text('availability');
            $table->text('level_of_study');
            $table->text('action');
            $table->text('duration');
            $table->date('date_posted')->nullable();
            $table->date('expiry_date')->nullable();
            $table->date('deadline')->nullable();
            $table->text('image')->nullable();
            $table->text('link')->nullable();
            $table->text('more_info')->nullable();
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
