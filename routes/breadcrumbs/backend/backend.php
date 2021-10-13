<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';




Breadcrumbs::for('admin.articles.index', function ($trail) {
    $trail->push('Articles', route('admin.articles.index'));
});

Breadcrumbs::for('admin.articles.create_article', function ($trail) {
    $trail->push('Articles / Create', route('admin.articles.create_article'));
});

Breadcrumbs::for('admin.articles.edit_article', function ($trail) {
    $trail->push('Articles / Edit', route('admin.articles.edit_article', 1));
});



Breadcrumbs::for('admin.businesses.index', function ($trail) {
    $trail->push('Businesses', route('admin.businesses.index'));
});

Breadcrumbs::for('admin.businesses.create_business', function ($trail) {
    $trail->push('Businesses / Create', route('admin.businesses.create_business'));
});

Breadcrumbs::for('admin.businesses.edit_business', function ($trail) {
    $trail->push('Businesses / Edit', route('admin.businesses.edit_business', 1));
});



Breadcrumbs::for('admin.categories.index', function ($trail) {
    $trail->push('Business Categories', route('admin.categories.index'));
});

Breadcrumbs::for('admin.categories.create_category', function ($trail) {
    $trail->push('Business Categories / Create', route('admin.categories.create_category'));
});

Breadcrumbs::for('admin.categories.edit_category', function ($trail) {
    $trail->push('Business Categories / Edit', route('admin.categories.edit_category', 1));
});

Breadcrumbs::for('admin.categories.import_categories', function ($trail) {
    $trail->push('Business Categories / Import', route('admin.categories.import_categories'));
});




Breadcrumbs::for('admin.directory.index', function ($trail) {
    $trail->push('Online Business Directory', route('admin.directory.index'));
});

Breadcrumbs::for('admin.directory.create_directory', function ($trail) {
    $trail->push('Online Business Directory / Create', route('admin.directory.create_directory'));
});

Breadcrumbs::for('admin.directory.edit_directory', function ($trail) {
    $trail->push('Online Business Directory / Edit', route('admin.directory.edit_directory', 1));
});

Breadcrumbs::for('admin.directory.import_directory', function ($trail) {
    $trail->push('Online Business Directory / Import', route('admin.directory.import_directory'));
});



Breadcrumbs::for('admin.careers.how_careers_came_about', function ($trail) {
    $trail->push('Careers / How these careers came about', route('admin.careers.how_careers_came_about'));
});

Breadcrumbs::for('admin.careers.all_careers', function ($trail) {
    $trail->push('Careers / All Careers', route('admin.careers.all_careers'));
});

Breadcrumbs::for('admin.careers.create_career', function ($trail) {
    $trail->push('Careers / All Careers / Create', route('admin.careers.create_career'));
});

Breadcrumbs::for('admin.careers.edit_career', function ($trail) {
    $trail->push('Careers / All Careers / Edit', route('admin.careers.edit_career', 1));
});

Breadcrumbs::for('admin.careers.import_careers', function ($trail) {
    $trail->push('Careers / All Careers / Import', route('admin.careers.import_careers'));
});

Breadcrumbs::for('admin.careers.hot_careers', function ($trail) {
    $trail->push('Careers / Hot Careers', route('admin.careers.hot_careers'));
});





Breadcrumbs::for('admin.events.index', function ($trail) {
    $trail->push('Events', route('admin.events.index'));
});

Breadcrumbs::for('admin.events.create_event', function ($trail) {
    $trail->push('Events / Create', route('admin.events.create_event'));
});

Breadcrumbs::for('admin.events.edit_event', function ($trail) {
    $trail->push('Events / Edit', route('admin.events.edit_event', 1));
});




Breadcrumbs::for('admin.pages.about_us', function ($trail) {
    $trail->push('Pages / About Us', route('admin.pages.about_us'));
});

Breadcrumbs::for('admin.pages.faq', function ($trail) {
    $trail->push('Pages / Frequently Asked Questions', route('admin.pages.faq'));
});

Breadcrumbs::for('admin.pages.meet_our_team', function ($trail) {
    $trail->push('Pages / Meet Our Team', route('admin.pages.meet_our_team'));
});

Breadcrumbs::for('admin.pages.our_sponsors', function ($trail) {
    $trail->push('Pages / Our Sponsors', route('admin.pages.our_sponsors'));
});

Breadcrumbs::for('admin.pages.privacy_policy', function ($trail) {
    $trail->push('Pages / Privacy Policy', route('admin.pages.privacy_policy'));
});

Breadcrumbs::for('admin.pages.disclaimer', function ($trail) {
    $trail->push('Pages / Disclaimer', route('admin.pages.disclaimer'));
});





Breadcrumbs::for('admin.videos.index', function ($trail) {
    $trail->push('Videos', route('admin.videos.index'));
});

Breadcrumbs::for('admin.videos.edit_video', function ($trail) {
    $trail->push('Videos / Edit', route('admin.videos.edit_video', 1));
});





Breadcrumbs::for('admin.team.index', function ($trail) {
    $trail->push('Team', route('admin.team.index'));
});

Breadcrumbs::for('admin.team.create_team', function ($trail) {
    $trail->push('Team / Create', route('admin.team.create_team'));
});

Breadcrumbs::for('admin.team.edit_team', function ($trail) {
    $trail->push('Team / Edit', route('admin.team.edit_team', 1));
});



Breadcrumbs::for('admin.sponsors.index', function ($trail) {
    $trail->push('Sponsors', route('admin.sponsors.index'));
});

Breadcrumbs::for('admin.sponsors.create_sponsor', function ($trail) {
    $trail->push('Sponsors / Create', route('admin.sponsors.create_sponsor'));
});

Breadcrumbs::for('admin.sponsors.edit_sponsor', function ($trail) {
    $trail->push('Sponsors / Edit', route('admin.sponsors.edit_sponsor', 1));
});





Breadcrumbs::for('admin.programs.index', function ($trail) {
    $trail->push('Programs', route('admin.programs.index'));
});

Breadcrumbs::for('admin.programs.create_program', function ($trail) {
    $trail->push('Programs / Create', route('admin.programs.create_program'));
});

Breadcrumbs::for('admin.programs.edit_program', function ($trail) {
    $trail->push('Programs / Edit', route('admin.programs.edit_program', 1));
});

Breadcrumbs::for('admin.programs.import_programs', function ($trail) {
    $trail->push('Programs / Import', route('admin.programs.import_programs'));
});




Breadcrumbs::for('admin.quotes.index', function ($trail) {
    $trail->push('Quotes', route('admin.quotes.index'));
});
Breadcrumbs::for('admin.quotes.create_quote', function ($trail) {
    $trail->push('Articles / Create', route('admin.quotes.create_quote'));
});
Breadcrumbs::for('admin.quotes.edit_quote', function ($trail) {
    $trail->push('Quotes / Approval', route('admin.quotes.edit_quote', 1));
});




Breadcrumbs::for('admin.schools.index', function ($trail) {
    $trail->push('Schools', route('admin.schools.index'));
});

Breadcrumbs::for('admin.schools.create_school', function ($trail) {
    $trail->push('Schools / Create', route('admin.schools.create_school'));
});

Breadcrumbs::for('admin.schools.edit_school', function ($trail) {
    $trail->push('Schools / Edit', route('admin.schools.edit_school', 1));
});



Breadcrumbs::for('admin.types.index', function ($trail) {
    $trail->push('School Types', route('admin.types.index'));
});

Breadcrumbs::for('admin.types.create_school_type', function ($trail) {
    $trail->push('School Types / Create', route('admin.types.create_school_type'));
});

Breadcrumbs::for('admin.types.edit_school_type', function ($trail) {
    $trail->push('School Types / Edit', route('admin.types.edit_school_type', 1));
});






Breadcrumbs::for('admin.networks.index', function ($trail) {
    $trail->push('World Wide Networks', route('admin.networks.index'));
});

Breadcrumbs::for('admin.networks.create_network', function ($trail) {
    $trail->push('World Wide Networks / Create', route('admin.networks.create_network'));
});

Breadcrumbs::for('admin.networks.edit_network', function ($trail) {
    $trail->push('World Wide Networks / Edit', route('admin.networks.edit_network', 1));
});




Breadcrumbs::for('admin.information.index', function ($trail) {
    $trail->push('Information', route('admin.information.index'));
});

