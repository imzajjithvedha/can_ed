<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ArticlesController;
use App\Http\Controllers\Backend\BusinessesController;
use App\Http\Controllers\Backend\BusinessCategoriesController;
use App\Http\Controllers\Backend\EventsController;
use App\Http\Controllers\Backend\DirectoryController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\SponsorsController;
use App\Http\Controllers\Backend\ProgramsController;
use App\Http\Controllers\Backend\QuotesController;
use App\Http\Controllers\Backend\SchoolsController;
use App\Http\Controllers\Backend\NetworksController;
use App\Http\Controllers\Backend\VideosController;
use App\Http\Controllers\Backend\CareersController;
use App\Http\Controllers\Backend\SchoolTypesController;
use App\Http\Controllers\Backend\WebsiteInformationController;



// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Route::get('program-subjects', [SchoolsController::class, 'index'])->name('schools.index');
// Route::get('faculties', [SchoolsController::class, 'index'])->name('schools.index');
// Route::get('school-types', [SchoolsController::class, 'index'])->name('schools.index');
// Route::get('degree-types', [SchoolsController::class, 'index'])->name('schools.index');







Route::get('articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('articles/create-article', [ArticlesController::class, 'createArticle'])->name('articles.create_article');
Route::post('articles/store-article', [ArticlesController::class, 'storeArticle'])->name('articles.store_article');
Route::get('articles/get-articles', [ArticlesController::class, 'getArticles'])->name('articles.get_articles');
Route::get('articles/edit-article/{id}', [ArticlesController::class, 'editArticle'])->name('articles.edit_article');
Route::post('articles/update-article', [ArticlesController::class, 'updateArticle'])->name('articles.update_article');
Route::get('articles/delete-article/{id}', [ArticlesController::class, 'deleteArticle'])->name('articles.delete_article');



Route::get('businesses', [BusinessesController::class, 'index'])->name('businesses.index');
Route::get('businesses/create-business', [BusinessesController::class, 'createBusiness'])->name('businesses.create_business');
Route::post('businesses/store-business', [BusinessesController::class, 'storeBusiness'])->name('businesses.store_business');
Route::get('businesses/get-businesses', [BusinessesController::class, 'getBusinesses'])->name('businesses.get_businesses');
Route::get('businesses/edit-business/{id}', [BusinessesController::class, 'editBusiness'])->name('businesses.edit_business');
Route::post('businesses/update-business', [BusinessesController::class, 'updateBusiness'])->name('businesses.update_business');
Route::get('businesses/delete-business/{id}', [BusinessesController::class, 'deleteBusiness'])->name('businesses.delete_business');


Route::get('business-categories', [BusinessCategoriesController::class, 'index'])->name('categories.index');
Route::get('business-categories/create-category', [BusinessCategoriesController::class, 'createCategory'])->name('categories.create_category');
Route::post('business-categories/store-category', [BusinessCategoriesController::class, 'storeCategory'])->name('categories.store_category');
Route::get('business-categories/get-categories', [BusinessCategoriesController::class, 'getCategories'])->name('categories.get_categories');
Route::get('business-categories/edit-category/{id}', [BusinessCategoriesController::class, 'editCategory'])->name('categories.edit_category');
Route::post('business-categories/update-category', [BusinessCategoriesController::class, 'updateCategory'])->name('categories.update_category');
Route::get('business-categories/delete-category/{id}', [BusinessCategoriesController::class, 'deleteCategory'])->name('categories.delete_category');
Route::get('business-categories/import-categories', [BusinessCategoriesController::class, 'importCategories'])->name('categories.import_categories');
Route::post('business-categories/import', [BusinessCategoriesController::class, 'import'])->name('categories.import');




Route::get('careers/how-these-career-came-about', [CareersController::class, 'howCareersCameAbout'])->name('careers.how_careers_came_about');
Route::post('careers/how-these-career-came-about/update', [CareersController::class, 'howCareersCameAboutUpdate'])->name('careers.how_careers_came_about_update');

Route::get('careers/all-careers', [CareersController::class, 'allCareers'])->name('careers.all_careers');
Route::get('careers/create-career', [CareersController::class, 'createCareer'])->name('careers.create_career');
Route::post('careers/store-career', [CareersController::class, 'storeCareer'])->name('careers.store_career');
Route::get('careers/get-careers', [CareersController::class, 'getCareers'])->name('careers.get_careers');
Route::get('careers/edit-career/{id}', [CareersController::class, 'editCareer'])->name('careers.edit_career');
Route::post('careers/update-career', [CareersController::class, 'updateCareer'])->name('careers.update_career');
Route::get('careers/delete-career/{id}', [CareersController::class, 'deleteCareer'])->name('careers.delete_career');
Route::get('careers/import-career', [CareersController::class, 'importCareers'])->name('careers.import_careers');
Route::post('careers/import', [CareersController::class, 'import'])->name('careers.import');

Route::get('careers/hot-careers', [CareersController::class, 'hotCareers'])->name('careers.hot_careers');
Route::post('careers/hot-careers/update', [CareersController::class, 'hotCareersUpdate'])->name('careers.hot_careers_update');






Route::get('events', [EventsController::class, 'index'])->name('events.index');
Route::get('events/create-event', [EventsController::class, 'createEvent'])->name('events.create_event');
Route::post('events/store-event', [EventsController::class, 'storeEvent'])->name('events.store_event');
Route::get('events/get-events', [EventsController::class, 'getEvents'])->name('events.get_events');
Route::get('events/edit-event/{id}', [EventsController::class, 'editEvent'])->name('events.edit_event');
Route::post('events/update-event', [EventsController::class, 'updateEvent'])->name('events.update_event');
Route::get('events/delete-event/{id}', [EventsController::class, 'deleteEvent'])->name('events.delete_event');




Route::get('directory', [DirectoryController::class, 'index'])->name('directory.index');
Route::get('directory/create-directory', [DirectoryController::class, 'createDirectory'])->name('directory.create_directory');
Route::post('directory/store-directory', [DirectoryController::class, 'storeDirectory'])->name('directory.store_directory');
Route::get('directory/get-directory', [DirectoryController::class, 'getDirectory'])->name('directory.get_directory');
Route::get('directory/edit-directory/{id}', [DirectoryController::class, 'editDirectory'])->name('directory.edit_directory');
Route::post('directory/update-directory', [DirectoryController::class, 'updateDirectory'])->name('directory.update_directory');
Route::get('directory/delete-directory/{id}', [DirectoryController::class, 'deleteDirectory'])->name('directory.delete_directory');
Route::get('directory/import-directory', [DirectoryController::class, 'importDirectory'])->name('directory.import_directory');
Route::post('directory/import', [DirectoryController::class, 'import'])->name('directory.import');




Route::get('programs', [ProgramsController::class, 'index'])->name('programs.index');
Route::get('programs/create-program', [ProgramsController::class, 'createProgram'])->name('programs.create_program');
Route::post('programs/store-program', [ProgramsController::class, 'storeProgram'])->name('programs.store_program');
Route::get('programs/get-programs', [ProgramsController::class, 'getPrograms'])->name('programs.get_programs');
Route::get('programs/edit-program/{id}', [ProgramsController::class, 'editProgram'])->name('programs.edit_program');
Route::post('programs/update-program', [ProgramsController::class, 'updateProgram'])->name('programs.update_program');
Route::get('programs/delete-program/{id}', [ProgramsController::class, 'deleteProgram'])->name('programs.delete_program');
Route::get('programs/import-programs', [ProgramsController::class, 'importPrograms'])->name('programs.import_programs');
Route::post('programs/import', [ProgramsController::class, 'import'])->name('programs.import');



Route::get('pages/about-us', [PagesController::class, 'aboutUs'])->name('pages.about_us');
Route::post('pages/about-us/update', [PagesController::class, 'aboutUsUpdate'])->name('pages.about_us_update');
Route::get('pages/frequently-asked-questions', [PagesController::class, 'FAQ'])->name('pages.faq');
Route::post('pages/frequently-asked-questions/update', [PagesController::class, 'FAQUpdate'])->name('pages.faq_update');
Route::get('pages/meet-our-team', [PagesController::class, 'meetOurTeam'])->name('pages.meet_our_team');
Route::post('pages/meet-our-team/update', [PagesController::class, 'meetOurTeamUpdate'])->name('pages.meet_our_team_update');
Route::get('pages/our-sponsors', [PagesController::class, 'ourSponsors'])->name('pages.our_sponsors');
Route::post('pages/our-sponsors/update', [PagesController::class, 'ourSponsorsUpdate'])->name('pages.our_sponsors_update');
Route::get('pages/privacy-policy', [PagesController::class, 'privacyPolicy'])->name('pages.privacy_policy');
Route::post('pages/privacy-policy/update', [PagesController::class, 'privacyPolicyUpdate'])->name('pages.privacy_policy_update');
Route::get('pages/disclaimer', [PagesController::class, 'disclaimer'])->name('pages.disclaimer');
Route::post('pages/disclaimer/update', [PagesController::class, 'disclaimerUpdate'])->name('pages.disclaimer_update');


Route::get('team', [TeamController::class, 'index'])->name('team.index');
Route::get('team/create-team', [TeamController::class, 'createTeam'])->name('team.create_team');
Route::post('team/store-team', [TeamController::class, 'storeTeam'])->name('team.store_team');
Route::get('team/get-team', [TeamController::class, 'getTeam'])->name('team.get_team');
Route::get('team/edit-team/{id}', [TeamController::class, 'editTeam'])->name('team.edit_team');
Route::post('team/update-team', [TeamController::class, 'updateTeam'])->name('team.update_team');
Route::get('team/delete-team/{id}', [TeamController::class, 'deleteTeam'])->name('team.delete_team');


Route::get('sponsors', [SponsorsController::class, 'index'])->name('sponsors.index');
Route::get('sponsors/create-sponsor', [SponsorsController::class, 'createSponsor'])->name('sponsors.create_sponsor');
Route::post('sponsors/store-sponsor', [SponsorsController::class, 'storeSponsor'])->name('sponsors.store_sponsor');
Route::get('sponsors/get-sponsor', [SponsorsController::class, 'getSponsors'])->name('sponsors.get_sponsors');
Route::get('sponsors/edit-sponsor/{id}', [SponsorsController::class, 'editSponsor'])->name('sponsors.edit_sponsor');
Route::post('sponsors/update-sponsor', [SponsorsController::class, 'updateSponsor'])->name('sponsors.update_sponsor');
Route::get('sponsors/delete-sponsor/{id}', [SponsorsController::class, 'deleteSponsor'])->name('sponsors.delete_sponsor');



Route::get('videos', [VideosController::class, 'index'])->name('videos.index');
Route::post('videos/store-video', [VideosController::class, 'storeVideo'])->name('videos.store_video');
Route::get('videos/get-videos', [VideosController::class, 'getVideos'])->name('videos.get_videos');
Route::get('videos/edit-video/{id}', [VideosController::class, 'editVideo'])->name('videos.edit_video');
Route::post('videos/update-video', [VideosController::class, 'updateVideo'])->name('videos.update_video');
Route::get('videos/delete-video/{id}', [VideosController::class, 'deleteVideo'])->name('videos.delete_video');



Route::get('quotes', [QuotesController::class, 'index'])->name('quotes.index');
Route::get('quotes/create-quote', [QuotesController::class, 'createQuote'])->name('quotes.create_quote');
Route::post('quotes/store-quote', [QuotesController::class, 'storeQuote'])->name('quotes.store_quote');
Route::get('quotes/get-quotes', [QuotesController::class, 'getQuotes'])->name('quotes.get_quotes');
Route::get('quotes/edit-quote/{id}', [QuotesController::class, 'editQuote'])->name('quotes.edit_quote');
Route::post('quotes/update-quote', [QuotesController::class, 'updateQuote'])->name('quotes.update_quote');
Route::get('quotes/delete-quote/{id}', [QuotesController::class, 'deleteQuote'])->name('quotes.delete_quote');



Route::get('networks', [NetworksController::class, 'index'])->name('networks.index');
Route::get('networks/create-network', [NetworksController::class, 'createNetwork'])->name('networks.create_network');
Route::post('networks/store-network', [NetworksController::class, 'storeNetwork'])->name('networks.store_network');
Route::get('networks/get-networks', [NetworksController::class, 'getNetworks'])->name('networks.get_networks');
Route::get('networks/edit-network/{id}', [NetworksController::class, 'editNetwork'])->name('networks.edit_network');
Route::post('networks/update-network', [NetworksController::class, 'updateNetwork'])->name('networks.update_network');
Route::get('networks/delete-network/{id}', [NetworksController::class, 'deleteNetwork'])->name('networks.delete_network');




Route::get('schools', [SchoolsController::class, 'index'])->name('schools.index');
Route::get('schools/create-school', [SchoolsController::class, 'createSchool'])->name('schools.create_school');
Route::post('schools/store-school', [SchoolsController::class, 'storeSchool'])->name('schools.store_school');
Route::get('schools/get-schools', [SchoolsController::class, 'getSchools'])->name('schools.get_schools');
Route::get('schools/edit-school/{id}', [SchoolsController::class, 'editSchool'])->name('schools.edit_school');
Route::post('schools/update-school', [SchoolsController::class, 'updateSchool'])->name('schools.update_school');
Route::get('schools/delete-school/{id}', [SchoolsController::class, 'deleteSchool'])->name('schools.delete_school');


Route::get('school-types', [SchoolTypesController::class, 'index'])->name('types.index');
Route::get('school-types/create-school-type', [SchoolTypesController::class, 'createSchoolType'])->name('types.create_school_type');
Route::post('school-types/store-school-type', [SchoolTypesController::class, 'storeSchoolType'])->name('types.store_school_type');
Route::get('school-types/get-school-types', [SchoolTypesController::class, 'getSchoolTypes'])->name('types.get_school_types');
Route::get('school-types/edit-school-type/{id}', [SchoolTypesController::class, 'editSchoolType'])->name('types.edit_school_type');
Route::post('school-types/update-school-type', [SchoolTypesController::class, 'updateSchoolType'])->name('types.update_school_type');
Route::get('school-types/delete-school-type/{id}', [SchoolTypesController::class, 'deleteSchoolType'])->name('types.delete_school_type');

Route::get('information', [WebsiteInformationController::class, 'index'])->name('information.index');
Route::post('information/update', [WebsiteInformationController::class, 'informationUpdate'])->name('information.update');




// Route::get('subscribers', [SchoolsController::class, 'index'])->name('schools.index');
// Route::get('fqa-management', [SchoolsController::class, 'index'])->name('schools.index');
// Route::get('clerks', [SchoolsController::class, 'index'])->name('schools.index');