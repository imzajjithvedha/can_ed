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

Breadcrumbs::for('admin.businesses.import_businesses', function ($trail) {
    $trail->push('Businesses / Import', route('admin.businesses.import_businesses'));
});



Breadcrumbs::for('admin.categories.index', function ($trail) {
    $trail->push('Business categories', route('admin.categories.index'));
});

Breadcrumbs::for('admin.categories.create_category', function ($trail) {
    $trail->push('Business categories / Create', route('admin.categories.create_category'));
});

Breadcrumbs::for('admin.categories.edit_category', function ($trail) {
    $trail->push('Business categories / Edit', route('admin.categories.edit_category', 1));
});

Breadcrumbs::for('admin.categories.import_categories', function ($trail) {
    $trail->push('Business categories / Import', route('admin.categories.import_categories'));
});




Breadcrumbs::for('admin.directory.index', function ($trail) {
    $trail->push('Online business directory', route('admin.directory.index'));
});

Breadcrumbs::for('admin.directory.create_directory', function ($trail) {
    $trail->push('Online business directory / Create', route('admin.directory.create_directory'));
});

Breadcrumbs::for('admin.directory.edit_directory', function ($trail) {
    $trail->push('Online business directory / Edit', route('admin.directory.edit_directory', 1));
});

Breadcrumbs::for('admin.directory.import_directory', function ($trail) {
    $trail->push('Online business directory / Import', route('admin.directory.import_directory'));
});



Breadcrumbs::for('admin.careers.how_careers_came_about', function ($trail) {
    $trail->push('Careers / How these careers came about', route('admin.careers.how_careers_came_about'));
});

Breadcrumbs::for('admin.careers.all_careers', function ($trail) {
    $trail->push('Careers / All careers', route('admin.careers.all_careers'));
});

Breadcrumbs::for('admin.careers.create_career', function ($trail) {
    $trail->push('Careers / All careers / Create', route('admin.careers.create_career'));
});

Breadcrumbs::for('admin.careers.edit_career', function ($trail) {
    $trail->push('Careers / All careers / Edit', route('admin.careers.edit_career', 1));
});

Breadcrumbs::for('admin.careers.import_careers', function ($trail) {
    $trail->push('Careers / All careers / Import', route('admin.careers.import_careers'));
});

Breadcrumbs::for('admin.logos.index', function ($trail) {
    $trail->push('Jobs logos', route('admin.logos.index'));
});

Breadcrumbs::for('admin.logos.create_logo', function ($trail) {
    $trail->push('Jobs logos / Create', route('admin.logos.create_logo'));
});

Breadcrumbs::for('admin.logos.edit_logo', function ($trail) {
    $trail->push('Jobs logos / Edit', route('admin.logos.edit_logo', 1));
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
    $trail->push('Pages / About us', route('admin.pages.about_us'));
});

Breadcrumbs::for('admin.pages.faq', function ($trail) {
    $trail->push('Pages / Frequently asked questions', route('admin.pages.faq'));
});

Breadcrumbs::for('admin.pages.meet_our_team', function ($trail) {
    $trail->push('Pages / Meet our team', route('admin.pages.meet_our_team'));
});

Breadcrumbs::for('admin.pages.our_sponsors', function ($trail) {
    $trail->push('Pages / Our sponsors', route('admin.pages.our_sponsors'));
});

Breadcrumbs::for('admin.pages.privacy_policy', function ($trail) {
    $trail->push('Pages / Privacy policy', route('admin.pages.privacy_policy'));
});

Breadcrumbs::for('admin.pages.disclaimer', function ($trail) {
    $trail->push('Pages / Disclaimer', route('admin.pages.disclaimer'));
});

Breadcrumbs::for('admin.pages.suggestions', function ($trail) {
    $trail->push('Pages / Suggestions', route('admin.pages.suggestions'));
});

Breadcrumbs::for('admin.pages.cookies', function ($trail) {
    $trail->push('Pages / Cookies', route('admin.pages.cookies'));
});

Breadcrumbs::for('admin.pages.terms_of_use', function ($trail) {
    $trail->push('Pages / Terms of use', route('admin.pages.terms_of_use'));
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
    $trail->push('Quotes / Create', route('admin.quotes.create_quote'));
});
Breadcrumbs::for('admin.quotes.edit_quote', function ($trail) {
    $trail->push('Quotes / Approval', route('admin.quotes.edit_quote', 1));
});




Breadcrumbs::for('admin.schools.index', function ($trail) {
    $trail->push('Schools', route('admin.schools.index'));
});

Breadcrumbs::for('admin.schools.import_schools', function ($trail) {
    $trail->push('Schools / Import', route('admin.schools.import_schools'));
});

Breadcrumbs::for('admin.schools.create_school', function ($trail) {
    $trail->push('Schools / Create', route('admin.schools.create_school'));
});

Breadcrumbs::for('admin.schools.school_information', function ($trail) {
    $trail->push('School / Information', route('admin.schools.school_information', 1));
});

Breadcrumbs::for('admin.schools.school_admission', function ($trail) {
    $trail->push('School / Admission', route('admin.schools.school_admission', 1));
});

Breadcrumbs::for('admin.schools.school_admission_edit', function ($trail) {
    $trail->push('School / Admission / Employee / Edit', route('admin.schools.school_admission_edit', [1, 1]));
});

Breadcrumbs::for('admin.schools.school_admission_faq', function ($trail) {
    $trail->push('School / Admission FAQ', route('admin.schools.school_admission_faq', 1));
});

Breadcrumbs::for('admin.schools.school_admission_faq_edit', function ($trail) {
    $trail->push('School / Admission FAQ / Edit', route('admin.schools.school_admission_faq_edit', [1, 1]));
});

Breadcrumbs::for('admin.schools.school_quick_facts', function ($trail) {
    $trail->push('School / Quick facts', route('admin.schools.school_quick_facts', 1));
});

Breadcrumbs::for('admin.schools.school_programs', function ($trail) {
    $trail->push('School / Programs', route('admin.schools.school_programs', 1));
});

Breadcrumbs::for('admin.schools.import_programs', function ($trail) {
    $trail->push('School / Programs / Import', route('admin.schools.import_programs'));
});

Breadcrumbs::for('admin.schools.school_program_edit', function ($trail) {
    $trail->push('School / Programs / Edit', route('admin.schools.school_program_edit', [1, 1]));
});

Breadcrumbs::for('admin.schools.school_scholarships', function ($trail) {
    $trail->push('School / Scholarships', route('admin.schools.school_scholarships', 1));
});

Breadcrumbs::for('admin.schools.import_scholarships', function ($trail) {
    $trail->push('School / Scholarships / Import', route('admin.schools.import_scholarships'));
});

Breadcrumbs::for('admin.schools.school_scholarship_edit', function ($trail) {
    $trail->push('School / Scholarships / Edit', route('admin.schools.school_scholarship_edit', [1, 1]));
});

Breadcrumbs::for('admin.schools.school_scholarships_faq', function ($trail) {
    $trail->push('School / Scholarships FAQ', route('admin.schools.school_scholarships_faq', 1));
});

Breadcrumbs::for('admin.schools.school_scholarship_faq_edit', function ($trail) {
    $trail->push('School / Scholarships FAQ / Edit', route('admin.schools.school_scholarship_faq_edit', [1, 1]));
});

Breadcrumbs::for('admin.schools.school_contacts', function ($trail) {
    $trail->push('School / Contacts', route('admin.schools.school_contacts', 1));
});

Breadcrumbs::for('admin.schools.school_contact_edit', function ($trail) {
    $trail->push('School / Contact / Edit', route('admin.schools.school_contact_edit', [1, 1]));
});

Breadcrumbs::for('admin.schools.school_overview', function ($trail) {
    $trail->push('School / Overview', route('admin.schools.school_overview', 1));
});

Breadcrumbs::for('admin.schools.school_overview_faq', function ($trail) {
    $trail->push('School / Overview FAQ', route('admin.schools.school_overview_faq', 1));
});

Breadcrumbs::for('admin.schools.school_overview_faq_edit', function ($trail) {
    $trail->push('School / Overview FAQ / Edit', route('admin.schools.school_overview_faq_edit', [1, 1]));
});

Breadcrumbs::for('admin.schools.school_financial', function ($trail) {
    $trail->push('School / Financial', route('admin.schools.school_financial', 1));
});

Breadcrumbs::for('admin.schools.school_financial_faq', function ($trail) {
    $trail->push('School / Financial FAQ', route('admin.schools.school_financial_faq', 1));
});

Breadcrumbs::for('admin.schools.school_financial_faq_edit', function ($trail) {
    $trail->push('School / Financial FAQ / Edit', route('admin.schools.school_financial_faq_edit', [1, 1]));
});


Breadcrumbs::for('admin.open_days.index', function ($trail) {
    $trail->push('Open days', route('admin.open_days.index'));
});

Breadcrumbs::for('admin.open_days.create_open_day', function ($trail) {
    $trail->push('Open days / Create', route('admin.open_days.create_open_day'));
});

Breadcrumbs::for('admin.open_days.edit_open_day', function ($trail) {
    $trail->push('Open days / Edit', route('admin.open_days.edit_open_day', 1));
});



Breadcrumbs::for('admin.virtual_tours.index', function ($trail) {
    $trail->push('Virtual tours', route('admin.virtual_tours.index'));
});

Breadcrumbs::for('admin.virtual_tours.create_virtual_tour', function ($trail) {
    $trail->push('Virtual tours / Create', route('admin.virtual_tours.create_virtual_tour'));
});

Breadcrumbs::for('admin.virtual_tours.edit_virtual_tour', function ($trail) {
    $trail->push('Virtual tours / Edit', route('admin.virtual_tours.edit_virtual_tour', 1));
});




Breadcrumbs::for('admin.types.index', function ($trail) {
    $trail->push('School types', route('admin.types.index'));
});

Breadcrumbs::for('admin.types.create_school_type', function ($trail) {
    $trail->push('School types / Create', route('admin.types.create_school_type'));
});

Breadcrumbs::for('admin.types.edit_school_type', function ($trail) {
    $trail->push('School types / Edit', route('admin.types.edit_school_type', 1));
});

Breadcrumbs::for('admin.types.import_school_types', function ($trail) {
    $trail->push('School types / Import', route('admin.types.import_school_types'));
});



Breadcrumbs::for('admin.scholarships.index', function ($trail) {
    $trail->push('Scholarships', route('admin.scholarships.index'));
});

Breadcrumbs::for('admin.scholarships.create_scholarship', function ($trail) {
    $trail->push('Scholarships / Create', route('admin.scholarships.create_scholarship'));
});

Breadcrumbs::for('admin.scholarships.edit_scholarship', function ($trail) {
    $trail->push('Scholarships / Edit', route('admin.scholarships.edit_scholarship', 1));
});

Breadcrumbs::for('admin.scholarships.import_scholarships', function ($trail) {
    $trail->push('Scholarships / Import', route('admin.scholarships.import_scholarships'));
});




Breadcrumbs::for('admin.degree_levels.index', function ($trail) {
    $trail->push('Degree levels', route('admin.degree_levels.index'));
});

Breadcrumbs::for('admin.degree_levels.create_degree_level', function ($trail) {
    $trail->push('Degree levels / Create', route('admin.degree_levels.create_degree_level'));
});

Breadcrumbs::for('admin.degree_levels.edit_degree_level', function ($trail) {
    $trail->push('Degree levels / Edit', route('admin.degree_levels.edit_degree_level', 1));
});

Breadcrumbs::for('admin.degree_levels.import_degree_levels', function ($trail) {
    $trail->push('Degree levels / Import', route('admin.degree_levels.import_degree_levels'));
});






Breadcrumbs::for('admin.networks.index', function ($trail) {
    $trail->push('World wide networks', route('admin.networks.index'));
});

Breadcrumbs::for('admin.networks.create_network', function ($trail) {
    $trail->push('World wide networks / Create', route('admin.networks.create_network'));
});

Breadcrumbs::for('admin.networks.edit_network', function ($trail) {
    $trail->push('World wide networks / Edit', route('admin.networks.edit_network', 1));
});




Breadcrumbs::for('admin.information.index', function ($trail) {
    $trail->push('Information', route('admin.information.index'));
});


// Master application breadcrumbs
Breadcrumbs::for('admin.master.index', function ($trail) {
    $trail->push('Master applications', route('admin.master.index'));
});

Breadcrumbs::for('admin.master.view_application', function ($trail) {
    $trail->push('Master applications / View', route('admin.master.view_application', 1));
});

