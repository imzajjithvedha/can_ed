<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('name');
            $table->text('website');
            $table->text('user_email');
            $table->text('user_phone');
            $table->text('reach_time');
            $table->text('time_zone');
            $table->text('school_email')->nullable();
            $table->text('school_phone')->nullable();
            $table->text('country');
            $table->text('message');
            $table->text('status');
            $table->text('featured_image')->nullable();
            $table->text('images')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('you_tube')->nullable();
            $table->text('linked_in')->nullable();
            $table->text('location')->nullable();
            $table->text('school_type')->nullable();
            $table->text('language')->nullable();
            $table->text('undergraduates')->nullable();
            $table->text('entrance_dates')->nullable();
            $table->text('canadian_tuition_fee')->nullable();
            $table->text('international_tuition_fee')->nullable();
            $table->text('fax')->nullable();
            $table->text('address')->nullable();
            $table->text('scholarships')->nullable();
            $table->text('scholarships_top')->nullable();
            $table->text('scholarships_bottom')->nullable();
            $table->text('link_1_name')->nullable();
            $table->text('link_1_url')->nullable();
            $table->text('link_2_name')->nullable();
            $table->text('link_2_url')->nullable();
            $table->text('link_3_name')->nullable();
            $table->text('link_3_url')->nullable();
            $table->text('link_4_name')->nullable();
            $table->text('link_4_url')->nullable();
            $table->text('link_5_name')->nullable();
            $table->text('link_5_url')->nullable();
            $table->text('start_dates')->nullable();
            $table->text('online_distance_education')->nullable();
            $table->text('minimum_gpa')->nullable();
            $table->text('conditional_admission')->nullable();
            $table->text('graduate_program_type')->nullable();
            $table->text('under_graduate_program_type')->nullable();
            $table->text('study_method')->nullable();
            $table->text('delivery_mode')->nullable();
            $table->text('tuition_range')->nullable();
            $table->text('accommodation')->nullable();
            $table->text('work_on_campus')->nullable();
            $table->text('work_during_holidays')->nullable();
            $table->text('internship')->nullable();
            $table->text('co_op_education')->nullable();
            $table->text('job_placement')->nullable();
            $table->text('financial_aid_domestic')->nullable();
            $table->text('financial_aid_international')->nullable();
            $table->text('research')->nullable();
            $table->text('exchange_programs')->nullable();
            $table->text('degree_modifier')->nullable();
            $table->text('day_care')->nullable();
            $table->text('elementary_school')->nullable();
            $table->text('immigration_office')->nullable();
            $table->text('career_planning')->nullable();
            $table->text('pathway_programs')->nullable();
            $table->text('employment_rates')->nullable();
            $table->text('class_size_undergraduate')->nullable();
            $table->text('class_size_masters')->nullable();
            $table->text('service_and_guidance_new_students')->nullable();
            $table->text('service_and_guidance_new_arrivals')->nullable();
            $table->text('contact_paragraph')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
