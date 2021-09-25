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


use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\UserSchoolController;
use App\Http\Controllers\Frontend\User\UserBusinessController;

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
Route::get('privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy_policy');
Route::get('disclaimer', [DisclaimerController::class, 'index'])->name('disclaimer');

Route::get('schools', [SchoolController::class, 'index'])->name('schools');
Route::get('school-register', [SchoolController::class, 'schoolRegister'])->name('school_register');
Route::get('schools/single-school', [SchoolController::class, 'singleSchool'])->name('single_school');

Route::get('events', [EventController::class, 'index'])->name('events');
Route::get('get-events', [EventController::class, 'getEvents'])->name('get_events');
Route::get('events/single-event/{id}', [EventController::class, 'singleEvent'])->name('single_event');


Route::get('online-business-directory', [OnlineBusinessDirectoryController::class, 'index'])->name('online_business_directory');
Route::get('quotes', [QuoteController::class, 'index'])->name('quotes');
Route::get('world-wide-network', [WorldWideNetworkController::class, 'index'])->name('world_wide_network');

Route::get('business-categories', [BusinessController::class, 'businessCategories'])->name('business_categories');
Route::get('business-categories/{id}/businesses', [BusinessController::class, 'businesses'])->name('businesses');
Route::get('business-register', [BusinessController::class, 'businessRegister'])->name('business_register');
Route::get('businesses/single-business/{id}', [BusinessController::class, 'singleBusiness'])->name('single_business');

Route::get('programs', [ProgramController::class, 'index'])->name('programs');
Route::get('careers', [CareerController::class, 'careers'])->name('careers');
Route::get('jobs', [CareerController::class, 'jobs'])->name('jobs');
Route::get('site-map', [SitemapController::class, 'index'])->name('site_map');


Route::get('contact-us', [ContactController::class, 'index'])->name('contact_us');


Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::post('school-register/request', [SchoolController::class, 'schoolRegisterRequest'])->name('school_register_request');
Route::post('business-register/request', [BusinessController::class, 'businessRegisterRequest'])->name('business_register_request');
Route::post('quotes/request', [QuoteController::class, 'quoteRequest'])->name('quote_request');
Route::post('events/request', [EventController::class, 'eventRequest'])->name('event_request');




Route::post('articles/search-result', [ArticleController::class, 'articleSearch'])->name('article_search');
Route::get('article-search-results/{keyword}',[ArticleController::class,'articleSearchFunction'])->name('article_search_function');

Route::post('businesses/search-result', [BusinessController::class, 'businessSearch'])->name('business_search');
Route::get('business-search-results/{business}/{location}',[BusinessController::class,'businessSearchFunction'])->name('business_search_function');

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


        Route::get('user-events', [DashboardController::class, 'userEvents'])->name('user_events');
        Route::get('user-events/edit/{id}', [DashboardController::class, 'userEventEdit'])->name('user_event_edit');
        Route::post('user-events/update', [DashboardController::class, 'userEventUpdate'])->name('user_event_update');
        Route::get('user-events/delete/{id}', [DashboardController::class, 'userEventDelete'])->name('user_event_delete');


        Route::get('user-quotes', [DashboardController::class, 'userQuotes'])->name('user_quotes');
        Route::post('user-quotes/update', [DashboardController::class, 'userQuoteUpdate'])->name('user_quote_update');
        Route::get('user-quotes/delete/{id}', [DashboardController::class, 'userQuoteDelete'])->name('user_quote_delete');

        Route::get('favorite-articles', [DashboardController::class, 'favoriteArticles'])->name('favorite_articles');
        Route::get('favorite-articles/delete/{id}', [DashboardController::class, 'favoriteArticleDelete'])->name('favorite_article_delete');
        
        Route::get('favorite-schools', [DashboardController::class, 'favoriteSchools'])->name('favorite_schools');
        Route::get('favorite-businesses', [DashboardController::class, 'favoriteBusinesses'])->name('favorite_businesses');







        Route::get('school-dashboard', [UserSchoolController::class, 'schoolDashboard'])->name('school_dashboard');
        Route::get('suggested-programs', [UserSchoolController::class, 'suggestedPrograms'])->name('suggested_programs');



        Route::get('business-dashboard', [UserBusinessController::class, 'businessDashboard'])->name('business_dashboard');
        Route::get('user-businesses/edit/{id}', [UserBusinessController::class, 'userBusinessEdit'])->name('user_business_edit');
        Route::post('user-businesses/update', [UserBusinessController::class, 'userBusinessUpdate'])->name('user_business_update');
        Route::get('user-businesses/delete/{id}', [UserBusinessController::class, 'userBusinessDelete'])->name('user_business_delete');

        

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
