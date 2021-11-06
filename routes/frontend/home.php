<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\FAQController;
use App\Http\Controllers\Frontend\MeetOurTeamController;
use App\Http\Controllers\Frontend\OurSponsorController;
use App\Http\Controllers\Frontend\PrivacyPolicyController;
use App\Http\Controllers\Frontend\DisclaimerController;
use App\Http\Controllers\Frontend\SchoolController;
use App\Http\Controllers\Frontend\BusinessController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\OnlineBusinessDirectoryController;
use App\Http\Controllers\Frontend\QuoteController;
use App\Http\Controllers\Frontend\WorldWideNetworkController;
use App\Http\Controllers\Frontend\ProgramController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\SitemapController;
use App\Http\Controllers\Frontend\SuggestionController;
use App\Http\Controllers\Frontend\SchoolTypeController;
use App\Http\Controllers\Frontend\VideoController;



use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\UserSuggestedProgramController;
use App\Http\Controllers\Frontend\User\UserBusinessController;
use App\Http\Controllers\Frontend\User\UserProfileController;
use App\Http\Controllers\Frontend\User\UserSchoolProgramController;
use App\Http\Controllers\Frontend\User\UserSchoolScholarshipController;
use App\Http\Controllers\Frontend\User\UserSchoolContactController;
use App\Http\Controllers\Frontend\User\UserSchoolQuickFactsController;
use App\Http\Controllers\Frontend\User\UserSchoolInformationController;
use App\Http\Controllers\Frontend\User\UserSchoolScholarshipFAQController;
use App\Http\Controllers\Frontend\User\UserSchoolOverviewController;
use App\Http\Controllers\Frontend\User\UserSchoolOverviewFAQController;
use App\Http\Controllers\Frontend\User\UserSchoolAdmissionController;
use App\Http\Controllers\Frontend\User\UserSchoolAdmissionEmployeeController;
use App\Http\Controllers\Frontend\User\UserSchoolAdmissionFAQController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('articles', [ArticleController::class, 'index'])->name('articles');
Route::get('articles/single-article/{id}', [ArticleController::class, 'singleArticle'])->name('single_article');
Route::post('articles/single-article/favorite', [ArticleController::class, 'favoriteArticle'])->name('favorite_article');


Route::get('about-us', [AboutController::class, 'index'])->name('about_us');
Route::get('frequently-asked-questions', [FAQController::class, 'index'])->name('faq');
Route::get('meet-our-team', [MeetOurTeamController::class, 'index'])->name('meet_our_team');
Route::get('our-sponsors', [OurSponsorController::class, 'index'])->name('our_sponsors');


Route::get('suggestions', [SuggestionController::class, 'index'])->name('suggestions');
Route::post('suggestions/send', [SuggestionController::class, 'send'])->name('suggestion_send');




Route::get('privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy_policy');
Route::get('disclaimer', [DisclaimerController::class, 'index'])->name('disclaimer');




Route::get('schools', [SchoolController::class, 'index'])->name('schools');
Route::get('school-register', [SchoolController::class, 'schoolRegister'])->name('school_register');
Route::get('schools/single-school/{id}', [SchoolController::class, 'singleSchool'])->name('single_school');
Route::post('school-register/request', [SchoolController::class, 'schoolRegisterRequest'])->name('school_register_request');
Route::post('schools/single-school/favorite', [SchoolController::class, 'favoriteSchool'])->name('favorite_school');



Route::get('events', [EventController::class, 'index'])->name('events');
Route::get('get-events', [EventController::class, 'getEvents'])->name('get_events');
Route::get('events/single-event/{id}', [EventController::class, 'singleEvent'])->name('single_event');
Route::post('events/request', [EventController::class, 'eventRequest'])->name('event_request');


Route::get('online-business-directory', [OnlineBusinessDirectoryController::class, 'index'])->name('online_business_directory');


Route::get('quotes', [QuoteController::class, 'index'])->name('quotes');
Route::post('quotes/request', [QuoteController::class, 'quoteRequest'])->name('quote_request');



Route::get('world-wide-network', [WorldWideNetworkController::class, 'index'])->name('world_wide_network');
Route::post('world-wide-network/request', [WorldWideNetworkController::class, 'networkRequest'])->name('network_request');




Route::get('business-categories', [BusinessController::class, 'businessCategories'])->name('business_categories');
Route::get('business-categories/{id}/businesses', [BusinessController::class, 'businesses'])->name('businesses');
Route::get('business-register', [BusinessController::class, 'businessRegister'])->name('business_register');
Route::get('businesses/single-business/{id}', [BusinessController::class, 'singleBusiness'])->name('single_business');
Route::post('businesses/single-business/favorite', [BusinessController::class, 'favoriteBusiness'])->name('favorite_business');
Route::post('business-register/request', [BusinessController::class, 'businessRegisterRequest'])->name('business_register_request');
Route::post('businesses/single-business/contact', [BusinessController::class, 'BusinessSingleContact'])->name('business_single_contact');




Route::get('careers', [CareerController::class, 'careers'])->name('careers');
Route::get('jobs', [CareerController::class, 'jobs'])->name('jobs');
Route::get('site-map', [SitemapController::class, 'index'])->name('site_map');


Route::get('contact-us', [ContactController::class, 'index'])->name('contact_us');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact_send');



Route::get('programs', [ProgramController::class, 'index'])->name('programs');
Route::post('programs/request', [ProgramController::class, 'programRequest'])->name('program_request');



Route::post('articles/search-result', [ArticleController::class, 'articleSearch'])->name('article_search');
Route::get('article-search-results/{keyword}',[ArticleController::class,'articleSearchFunction'])->name('article_search_function');

Route::post('business-categories/search-result', [BusinessController::class, 'categorySearch'])->name('category_search');
Route::get('business-categories-search-results/{keyword}',[BusinessController::class,'categorySearchFunction'])->name('category_search_function');

Route::post('businesses/search-result', [BusinessController::class, 'businessSearch'])->name('business_search');
Route::get('businesses-search-results/{category}/{keyword}',[BusinessController::class,'businessSearchFunction'])->name('business_search_function');

Route::post('schools/search-result', [SchoolController::class, 'schoolSearch'])->name('school_search');
Route::get('schools-search-results/{keyword}',[SchoolController::class,'schoolSearchFunction'])->name('school_search_function');

Route::post('directory/search-result', [OnlineBusinessDirectoryController::class, 'directorySearch'])->name('directory_search');
Route::get('directory-search-results/{name}/{city}/{province}/{industry}',[OnlineBusinessDirectoryController::class,'directorySearchFunction'])->name('directory_search_function');


Route::get('videos', [VideoController::class, 'index'])->name('videos');



// Homepage search routes
Route::get('language-programs', [SchoolTypeController::class, 'languagePrograms'])->name('language_programs');
Route::get('get-language-programs', [SchoolTypeController::class, 'getLanguagePrograms'])->name('get_language_programs');
Route::get('community-schools', [SchoolTypeController::class, 'schoolsCategory'])->name('community_schools');
Route::get('bachelor-schools', [SchoolTypeController::class, 'schoolsCategory'])->name('bachelor_schools');
Route::get('masters-schools', [SchoolTypeController::class, 'schoolsCategory'])->name('master_schools');
Route::get('certificate-schools', [SchoolTypeController::class, 'schoolsCategory'])->name('certificate_schools');
Route::get('summer-schools', [SchoolTypeController::class, 'schoolsCategory'])->name('summer_schools');
Route::get('high-schools', [SchoolTypeController::class, 'schoolsCategory'])->name('high_schools');
Route::get('online-schools', [SchoolTypeController::class, 'schoolsCategory'])->name('online_schools');



Route::post('home/schools/search-result', [HomeController::class, 'homeSearch'])->name('home_search');
Route::get('home/schools-search-results/{keyword}',[HomeController::class,'schoolSearchFunction'])->name('home_school_search_function');
Route::get('home/businesses-search-results/{keyword}',[HomeController::class,'businessSearchFunction'])->name('home_business_search_function');
Route::get('home/programs-search-results/{keyword}',[HomeController::class,'programSearchFunction'])->name('home_program_search_function');
Route::get('home/articles-search-results/{keyword}',[HomeController::class,'articleSearchFunction'])->name('home_article_search_function');



Route::post('school-scholarships/search-result', [SchoolController::class, 'schoolScholarshipSearch'])->name('school_scholarship_search');
Route::get('school-scholarships-search-results/{id}/{keyword}/{award}/{level}/{available}',[SchoolController::class,'schoolScholarshipSearchFunction'])->name('school_scholarship_search_function');


/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('account-dashboard', [DashboardController::class, 'accountDashboard'])->name('account_dashboard');


        Route::get('account-information', [DashboardController::class, 'accountInformation'])->name('account_information');
        Route::post('account-information/update', [DashboardController::class, 'accountInformationUpdate'])->name('account_information_update');


        Route::get('user-events', [DashboardController::class, 'userEvents'])->name('user_events');
        Route::get('user-events/edit/{id}', [DashboardController::class, 'userEventEdit'])->name('user_event_edit');
        Route::post('user-events/update', [DashboardController::class, 'userEventUpdate'])->name('user_event_update');
        Route::get('user-events/delete/{id}', [DashboardController::class, 'userEventDelete'])->name('user_event_delete');


        Route::get('favorite-articles', [DashboardController::class, 'favoriteArticles'])->name('favorite_articles');
        Route::get('favorite-articles/delete/{id}', [DashboardController::class, 'favoriteArticleDelete'])->name('favorite_article_delete');
        

        Route::get('user-quotes', [DashboardController::class, 'userQuotes'])->name('user_quotes');
        Route::post('user-quotes/update', [DashboardController::class, 'userQuoteUpdate'])->name('user_quote_update');
        Route::get('user-quotes/delete/{id}', [DashboardController::class, 'userQuoteDelete'])->name('user_quote_delete');


        Route::get('user-networks', [DashboardController::class, 'userNetworks'])->name('user_networks');
        Route::get('user-networks/edit/{id}', [DashboardController::class, 'userNetworkEdit'])->name('user_network_edit');
        Route::post('user-networks/update', [DashboardController::class, 'userNetworkUpdate'])->name('user_network_update');
        Route::get('user-networks/delete/{id}', [DashboardController::class, 'userNetworkDelete'])->name('user_network_delete');



        Route::get('favorite-schools', [UserSchoolController::class, 'favoriteSchools'])->name('favorite_schools');
        Route::get('favorite-schools/delete/{id}', [UserSchoolController::class, 'favoriteSchoolDelete'])->name('favorite_school_delete');




        //School Routes
        Route::get('school-information', [UserSchoolInformationController::class, 'schoolInformation'])->name('school_information');
        Route::post('school-information/update', [UserSchoolInformationController::class, 'schoolInformationUpdate'])->name('school_information_update');


        //School Overview
        Route::get('school-overview', [UserSchoolOverviewController::class, 'schoolOverview'])->name('school_overview');
        Route::post('schools-overview/update', [UserSchoolOverviewController::class, 'schoolOverviewUpdate'])->name('school_overview_update');

        Route::get('school-overview-faq', [UserSchoolOverviewFAQController::class, 'schoolOverviewFAQ'])->name('school_overview_faq');
        Route::get('get-school-overview-faq', [UserSchoolOverviewFAQController::class, 'getSchoolOverviewFAQ'])->name('get_school_overview_faq');
        Route::post('school-overview-faq/create', [UserSchoolOverviewFAQController::class, 'schoolOverviewFAQCreate'])->name('school_overview_faq_create');
        Route::get('school-overview-faq/edit/{id}', [UserSchoolOverviewFAQController::class, 'schoolOverviewFAQEdit'])->name('school_overview_faq_edit');
        Route::post('school-overview-faq/update', [UserSchoolOverviewFAQController::class, 'schoolOverviewFAQUpdate'])->name('school_overview_faq_update');
        Route::get('school-overview-faq/delete/{id}', [UserSchoolOverviewFAQController::class, 'SchoolOverviewFAQDelete'])->name('school_overview_faq_delete');



        //School Admission
        Route::get('school-admission', [UserSchoolAdmissionController::class, 'schoolAdmission'])->name('school_admission');
        Route::post('school-admission/update', [UserSchoolAdmissionController::class, 'schoolAdmissionUpdate'])->name('school_admission_update');


        Route::get('get-school-admission-employees', [UserSchoolAdmissionEmployeeController::class, 'getSchoolAdmissionEmployees'])->name('get_school_admission_employees');
        Route::post('school-admission-employee/create', [UserSchoolAdmissionEmployeeController::class, 'schoolAdmissionEmployeeCreate'])->name('school_admission_employee_create');
        Route::get('school-admission-employee/edit/{id}', [UserSchoolAdmissionEmployeeController::class, 'schoolAdmissionEmployeeEdit'])->name('school_admission_employee_edit');
        Route::post('school-admission-employee/update', [UserSchoolAdmissionEmployeeController::class, 'schoolAdmissionEmployeeUpdate'])->name('school_admission_employee_update');
        Route::get('school-admission-employee/delete/{id}', [UserSchoolAdmissionEmployeeController::class, 'SchoolAdmissionEmployeeDelete'])->name('school_admission_employee_delete');


        Route::get('school-admission-faq', [UserSchoolAdmissionFAQController::class, 'schoolAdmissionFAQ'])->name('school_admission_faq');
        Route::get('get-school-admission-faq', [UserSchoolAdmissionFAQController::class, 'getSchoolAdmissionFAQ'])->name('get_school_admission_faq');
        Route::post('school-admission-faq/create', [UserSchoolAdmissionFAQController::class, 'schoolAdmissionFAQCreate'])->name('school_admission_faq_create');
        Route::get('school-admission-faq/edit/{id}', [UserSchoolAdmissionFAQController::class, 'schoolAdmissionFAQEdit'])->name('school_admission_faq_edit');
        Route::post('school-admission-faq/update', [UserSchoolAdmissionFAQController::class, 'schoolAdmissionFAQUpdate'])->name('school_admission_faq_update');
        Route::get('school-admission-faq/delete/{id}', [UserSchoolAdmissionFAQController::class, 'SchoolAdmissionFAQDelete'])->name('school_admission_faq_delete');



        //School Financial
        Route::get('school-financial', [UserSchoolController::class, 'schoolFinancial'])->name('school_financial');


        Route::get('school-quick-facts', [UserSchoolQuickFactsController::class, 'schoolQuickFacts'])->name('school_quick_facts');
        Route::post('schools-quick-facts/update', [UserSchoolQuickFactsController::class, 'schoolQuickFactsUpdate'])->name('school_quick_facts_update');
        Route::post('school-quick-facts/paragraphs/update', [UserSchoolQuickFactsController::class, 'schoolQuickFactsParagraphsUpdate'])->name('school_quick_facts_paragraphs_update');


        Route::get('school-programs', [UserSchoolProgramController::class, 'schoolPrograms'])->name('school_programs');
        Route::get('get-school-programs', [UserSchoolProgramController::class, 'getSchoolPrograms'])->name('get_school_programs');
        Route::post('school-programs/create', [UserSchoolProgramController::class, 'schoolProgramCreate'])->name('school_program_create');
        Route::get('school-programs/edit/{id}', [UserSchoolProgramController::class, 'schoolProgramEdit'])->name('school_program_edit');
        Route::post('school-programs/update', [UserSchoolProgramController::class, 'schoolProgramUpdate'])->name('school_program_update');
        Route::get('school-programs/delete/{id}', [UserSchoolProgramController::class, 'SchoolProgramDelete'])->name('school_program_delete');
        Route::post('school-programs/paragraph/update', [UserSchoolProgramController::class, 'schoolProgramsParagraphUpdate'])->name('school_programs_paragraph_update');


        Route::get('school-scholarships', [UserSchoolScholarshipController::class, 'schoolScholarships'])->name('school_scholarships');
        Route::get('get-school-scholarships', [UserSchoolScholarshipController::class, 'getSchoolScholarships'])->name('get_school_scholarships');
        Route::post('school-scholarships/create', [UserSchoolScholarshipController::class, 'schoolScholarshipCreate'])->name('school_scholarship_create');
        Route::get('school-scholarships/edit/{id}', [UserSchoolScholarshipController::class, 'schoolScholarshipEdit'])->name('school_scholarship_edit');
        Route::post('school-scholarships/update', [UserSchoolScholarshipController::class, 'schoolScholarshipUpdate'])->name('school_scholarship_update');
        Route::get('school-scholarships/delete/{id}', [UserSchoolScholarshipController::class, 'SchoolScholarshipDelete'])->name('school_scholarship_delete');
        Route::post('school-scholarships/paragraph/update', [UserSchoolScholarshipController::class, 'schoolScholarshipsParagraphUpdate'])->name('school_scholarships_paragraph_update');


        Route::get('school-scholarships-faq', [UserSchoolScholarshipFAQController::class, 'schoolScholarshipsFAQ'])->name('school_scholarships_faq');
        Route::get('get-school-scholarships-faq', [UserSchoolScholarshipFAQController::class, 'getSchoolScholarshipsFAQ'])->name('get_school_scholarships_faq');
        Route::post('school-scholarships-faq/create', [UserSchoolScholarshipFAQController::class, 'schoolScholarshipFAQCreate'])->name('school_scholarship_faq_create');
        Route::get('school-scholarships-faq/edit/{id}', [UserSchoolScholarshipFAQController::class, 'schoolScholarshipFAQEdit'])->name('school_scholarship_faq_edit');
        Route::post('school-scholarships-faq/update', [UserSchoolScholarshipFAQController::class, 'schoolScholarshipFAQUpdate'])->name('school_scholarship_faq_update');
        Route::get('school-scholarships-faq/delete/{id}', [UserSchoolScholarshipFAQController::class, 'SchoolScholarshipFAQDelete'])->name('school_scholarship_faq_delete');


        Route::get('school-contacts', [UserSchoolContactController::class, 'schoolContacts'])->name('school_contacts');
        Route::get('get-school-contacts', [UserSchoolContactController::class, 'getSchoolContacts'])->name('get_school_contacts');
        Route::post('school-contacts/create', [UserSchoolContactController::class, 'schoolContactCreate'])->name('school_contact_create');
        Route::get('school-contacts/edit/{id}', [UserSchoolContactController::class, 'schoolContactEdit'])->name('school_contact_edit');
        Route::post('school-contacts/update', [UserSchoolContactController::class, 'schoolContactUpdate'])->name('school_contact_update');
        Route::get('school-contacts/delete/{id}', [UserSchoolContactController::class, 'SchoolContactDelete'])->name('school_contact_delete');
        Route::post('school-contacts/paragraph/update', [UserSchoolContactController::class, 'schoolContactsParagraphUpdate'])->name('school_contacts_paragraph_update');



        //Suggested Programs Routes
        Route::get('suggested-programs', [UserSuggestedProgramController::class, 'suggestedPrograms'])->name('suggested_programs');
        Route::get('suggested-programs/edit/{id}', [UserSuggestedProgramController::class, 'suggestedProgramEdit'])->name('suggested_program_edit');
        Route::post('suggested-programs/update', [UserSuggestedProgramController::class, 'suggestedProgramUpdate'])->name('suggested_program_update');
        Route::get('suggested-programs/delete/{id}', [UserSuggestedProgramController::class, 'suggestedProgramDelete'])->name('suggested_program_delete');



        //Business Routes
        Route::get('business-dashboard', [UserBusinessController::class, 'businessDashboard'])->name('business_dashboard');
        Route::get('user-businesses/edit/{id}', [UserBusinessController::class, 'userBusinessEdit'])->name('user_business_edit');
        Route::post('user-businesses/update', [UserBusinessController::class, 'userBusinessUpdate'])->name('user_business_update');
        Route::get('user-businesses/delete/{id}', [UserBusinessController::class, 'userBusinessDelete'])->name('user_business_delete');
        Route::get('favorite-businesses', [UserBusinessController::class, 'favoriteBusinesses'])->name('favorite_businesses');
        Route::get('favorite-businesses/delete/{id}', [UserBusinessController::class, 'favoriteBusinessDelete'])->name('favorite_business_delete');



        //Settings Route
        Route::get('user-settings', [UserProfileController::class, 'settingsDashboard'])->name('user_settings');
        Route::post('user-settings/update', [UserProfileController::class, 'settingsUpdate'])->name('settings_update');

        Route::post('user-account/delete', [UserProfileController::class, 'accountDelete'])->name('account_delete');

    });
});
