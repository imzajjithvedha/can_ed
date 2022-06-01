<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('logo')->nullable();
            $table->text('description');
            $table->text('address_1');
            $table->text('address_2');
            $table->text('address_3');
            $table->text('address_4');
            $table->text('address_5');
            $table->text('toll_free');
            $table->text('telephone');
            $table->text('email');
            $table->text('website_url');
            $table->text('facebook')->nullable();
            $table->text('linked_in')->nullable();
            $table->text('you_tube')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('main_banner')->nullable();
            $table->text('website_description');
            $table->text('featured_schools_description');
            $table->text('featured_businesses_description');
            $table->text('featured_common_articles_description');
            $table->text('featured_international_articles_description');
            $table->text('featured_canadian_articles_description');
            $table->text('featured_work_study_articles_description');
            $table->text('featured_financial_planning_articles_description');
            $table->text('featured_academic_help_articles_description');
            $table->text('featured_financial_help_articles_description');
            $table->text('featured_immigration_articles_description');
            $table->text('featured_proxima_study_articles_description');
            $table->text('featured_need_help_articles_description');
            $table->text('featured_events_description');
            $table->text('featured_videos_description');
            $table->text('recent_articles_description');
            $table->text('student_services_description');
            $table->text('advanced_search_description');
            $table->text('featured_open_days_description');
            $table->text('featured_virtual_tours_description');
            $table->text('master_application_description');
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
        Schema::dropIfExists('website_information');
    }
}
