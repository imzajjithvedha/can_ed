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
            $table->text('user_email')->nullable();
            $table->text('user_phone')->nullable();
            $table->text('reach_time')->nullable();
            $table->text('time_zone')->nullable();
            $table->text('school_email')->nullable();
            $table->text('school_phone')->nullable();
            $table->text('country');
            $table->text('province');
            $table->text('message')->nullable();
            $table->text('slug');
            $table->text('status');
            $table->text('featured');
            $table->text('featured_image')->nullable();
            $table->text('images')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('you_tube')->nullable();
            $table->text('linked_in')->nullable();
            $table->text('vk')->nullable();
            $table->text('main_button_title')->nullable();
            $table->text('main_button_sub_title')->nullable();
            $table->text('main_button_link')->nullable();
            $table->text('other_button_title')->nullable();
            $table->text('other_button_link')->nullable();
            // $table->text('category')->nullable();
            $table->text('quick_facts_status');
            $table->text('overview_status');
            $table->text('programs_status');
            $table->text('admissions_status');
            $table->text('financial_status');
            $table->text('scholarships_status');
            $table->text('contacts_status');


            $table->text('location')->nullable();
            $table->text('school_type')->nullable();
            $table->text('language')->nullable();
            $table->text('undergraduates')->nullable();
            $table->text('entrance_dates')->nullable();
            $table->text('canadian_tuition_fee')->nullable();
            $table->text('international_tuition_fee')->nullable();
            $table->text('fax')->nullable();
            $table->text('address')->nullable();
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
            $table->text('link_6_name')->nullable();
            $table->text('link_6_url')->nullable();
            $table->text('link_7_name')->nullable();
            $table->text('link_7_url')->nullable();
            $table->text('link_8_name')->nullable();
            $table->text('link_8_url')->nullable();
            $table->text('start_date')->nullable();
            $table->text('online_distance_education')->nullable();
            $table->text('minimum_gpa')->nullable();
            $table->text('conditional_acceptance')->nullable();

            $table->integer('number_of_programs')->nullable();
            $table->integer('number_of_graduate_programs')->nullable();
            $table->integer('number_of_undergraduate_programs')->nullable();
            $table->integer('number_of_students')->nullable();
            $table->integer('number_of_graduate_students')->nullable();
            $table->integer('number_of_undergraduate_students')->nullable();
            
            $table->text('study_method')->nullable();
            $table->text('delivery_mode')->nullable();
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
            $table->text('contacts_page_paragraph')->nullable();
            $table->text('quick_facts_title_1')->nullable();
            $table->text('quick_facts_title_1_paragraph')->nullable();
            $table->text('quick_facts_title_2')->nullable();
            $table->text('quick_facts_title_2_image')->nullable();
            $table->text('quick_facts_title_2_sub_title')->nullable();
            $table->text('quick_facts_title_2_paragraph')->nullable();
            $table->text('quick_facts_title_2_button')->nullable();
            $table->text('quick_facts_title_2_link')->nullable();
            $table->text('quick_facts_title_2_image_name')->nullable();
            $table->text('programs_page_paragraph')->nullable();
            $table->text('programs_title_1')->nullable();
            $table->text('scholarships_title_1')->nullable();
            $table->text('scholarships_title_1_paragraph')->nullable();
            $table->text('scholarships_text_content_1')->nullable();
            $table->text('scholarships_text_content_2')->nullable();
            $table->text('scholarships_title_2')->nullable();
            $table->text('scholarships_title_2_image')->nullable();
            $table->text('scholarships_title_2_sub_title')->nullable();
            $table->text('scholarships_title_2_paragraph')->nullable();
            $table->text('scholarships_title_2_button')->nullable();
            $table->text('scholarships_title_2_link')->nullable();
            $table->text('scholarships_title_2_image_name')->nullable();
            $table->text('scholarships_title_3')->nullable();
            $table->text('scholarships_title_3_paragraph')->nullable();
            $table->text('scholarships_text_content_3')->nullable();
            $table->text('scholarships_title_4')->nullable();
            $table->text('scholarships_title_4_image')->nullable();
            $table->text('scholarships_title_4_sub_title')->nullable();
            $table->text('scholarships_title_4_paragraph')->nullable();
            $table->text('scholarships_title_4_button')->nullable();
            $table->text('scholarships_title_4_link')->nullable();
            $table->text('scholarships_title_4_image_name')->nullable();

            $table->text('overview_title_1')->nullable();
            $table->text('overview_title_1_paragraph')->nullable();
            $table->text('overview_text_content_1')->nullable();
            $table->text('overview_title_2')->nullable();
            $table->text('overview_title_2_bullets')->nullable();
            $table->text('overview_title_3_image')->nullable();
            $table->text('overview_title_3_sub_title')->nullable();
            $table->text('overview_title_3_paragraph')->nullable();
            $table->text('overview_title_3_link')->nullable();
            $table->text('overview_title_3_image_name')->nullable();
            $table->text('overview_title_3_date')->nullable();
            $table->text('overview_title_3_button')->nullable();
            $table->text('overview_title_4')->nullable();
            $table->text('overview_title_4_paragraph')->nullable();
            $table->text('overview_title_4_image')->nullable();
            $table->text('overview_title_5')->nullable();
            $table->text('overview_title_5_paragraph')->nullable();
            $table->text('overview_title_6')->nullable();
            $table->text('overview_title_6_paragraph')->nullable();
            $table->text('overview_title_6_button')->nullable();
            $table->text('overview_title_6_link')->nullable();
            $table->text('overview_title_7')->nullable();
            $table->text('overview_title_7_paragraph')->nullable();
            $table->text('overview_title_8')->nullable();
            $table->text('overview_title_8_paragraph')->nullable();
            $table->text('overview_title_8_link')->nullable();
            $table->text('overview_title_8_button')->nullable();
            $table->text('overview_title_9')->nullable();
            $table->text('overview_title_9_image')->nullable();
            $table->text('overview_title_9_sub_title')->nullable();
            $table->text('overview_title_9_paragraph')->nullable();
            $table->text('overview_title_9_button')->nullable();
            $table->text('overview_title_9_link')->nullable();
            $table->text('overview_title_9_image_name')->nullable();
            $table->text('overview_title_10')->nullable();
            $table->text('overview_title_10_paragraph')->nullable();
            $table->text('overview_related_programs')->nullable();
            $table->text('overview_title_11')->nullable();
            $table->text('overview_title_11_paragraph')->nullable();
            $table->text('overview_title_12')->nullable();
            $table->text('overview_title_12_bullets')->nullable();
            $table->text('overview_title_13')->nullable();
            $table->text('overview_title_13_paragraph')->nullable();


            $table->text('admission_paragraph')->nullable();
            $table->text('admission_title_1')->nullable();
            $table->text('admission_title_1_paragraph')->nullable();
            $table->text('admission_text_content_1')->nullable();
            $table->text('admission_title_2')->nullable();
            $table->text('admission_title_2_bullets')->nullable();
            $table->text('admission_title_3')->nullable();
            $table->text('admission_title_3_paragraph')->nullable();
            $table->text('admission_title_4')->nullable();
            $table->text('admission_title_4_paragraph')->nullable();
            $table->text('admission_title_5')->nullable();
            $table->text('admission_title_5_paragraph')->nullable();
            // $table->text('admission_title_6')->nullable();
            // $table->text('admission_title_6_paragraph')->nullable();

            $table->text('financial_title_1')->nullable();
            $table->text('financial_title_1_paragraph')->nullable();
            $table->text('financial_title_2')->nullable();
            $table->text('financial_title_2_tab_1')->nullable();
            $table->text('financial_title_2_tab_2')->nullable();
            $table->text('financial_title_2_tab_3')->nullable();

            $table->text('financial_tab_1_sub_title_1')->nullable();
            $table->text('financial_tab_1_sub_title_1_bullet')->nullable();
            $table->text('financial_tab_1_sub_title_1_bullet_price')->nullable();
            $table->text('financial_tab_1_sub_title_2')->nullable();
            $table->text('financial_tab_1_sub_title_2_paragraph')->nullable();
            $table->text('financial_tab_1_sub_title_3')->nullable();
            $table->text('financial_tab_1_sub_title_3_bullet_1')->nullable();
            $table->text('financial_tab_1_sub_title_3_bullet_1_price')->nullable();
            $table->text('financial_tab_1_sub_title_3_bullet_2')->nullable();
            $table->text('financial_tab_1_sub_title_3_bullet_2_price')->nullable();
            $table->text('financial_tab_1_sub_title_3_bullet_3')->nullable();
            $table->text('financial_tab_1_sub_title_3_bullet_3_price')->nullable();
            $table->text('financial_tab_1_sub_title_3_paragraph')->nullable();

            $table->text('financial_tab_2_sub_title_1')->nullable();
            $table->text('financial_tab_2_sub_title_1_bullet')->nullable();
            $table->text('financial_tab_2_sub_title_1_bullet_price')->nullable();
            $table->text('financial_tab_2_sub_title_2')->nullable();
            $table->text('financial_tab_2_sub_title_2_paragraph')->nullable();
            $table->text('financial_tab_2_sub_title_3')->nullable();
            $table->text('financial_tab_2_sub_title_3_bullet_1')->nullable();
            $table->text('financial_tab_2_sub_title_3_bullet_1_price')->nullable();
            $table->text('financial_tab_2_sub_title_3_bullet_2')->nullable();
            $table->text('financial_tab_2_sub_title_3_bullet_2_price')->nullable();
            $table->text('financial_tab_2_sub_title_3_bullet_3')->nullable();
            $table->text('financial_tab_2_sub_title_3_bullet_3_price')->nullable();
            $table->text('financial_tab_2_sub_title_3_paragraph')->nullable();

            $table->text('financial_tab_3_sub_title_1')->nullable();
            $table->text('financial_tab_3_sub_title_1_bullet')->nullable();
            $table->text('financial_tab_3_sub_title_1_bullet_price')->nullable();
            $table->text('financial_tab_3_sub_title_2')->nullable();
            $table->text('financial_tab_3_sub_title_2_paragraph')->nullable();
            $table->text('financial_tab_3_sub_title_3')->nullable();
            $table->text('financial_tab_3_sub_title_3_bullet_1')->nullable();
            $table->text('financial_tab_3_sub_title_3_bullet_1_price')->nullable();
            $table->text('financial_tab_3_sub_title_3_bullet_2')->nullable();
            $table->text('financial_tab_3_sub_title_3_bullet_2_price')->nullable();
            $table->text('financial_tab_3_sub_title_3_bullet_3')->nullable();
            $table->text('financial_tab_3_sub_title_3_bullet_3_price')->nullable();
            $table->text('financial_tab_3_sub_title_3_paragraph')->nullable();

            $table->text('financial_title_3')->nullable();
            $table->text('financial_title_3_paragraph')->nullable();
            $table->text('financial_title_4')->nullable();
            $table->text('financial_title_4_paragraph')->nullable();
            $table->text('financial_related_programs_4')->nullable();
            $table->text('financial_title_5')->nullable();
            $table->text('financial_title_5_paragraph')->nullable();
            $table->text('financial_title_6')->nullable();
            $table->text('financial_title_6_paragraph')->nullable();
            // $table->text('financial_related_programs_6')->nullable();
            $table->text('financial_text_content_1')->nullable();

            $table->text('marked_facts')->nullable();

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
