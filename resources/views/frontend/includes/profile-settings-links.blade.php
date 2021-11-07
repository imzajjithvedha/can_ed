<div class="border">

    <div class="nav flex-column profile-settings align-items-start justify-content-start" id="nav-tab" role="tablist">

        <h5 class="px-3 mt-4 pb-2 mb-0">My Account</h5>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'account-dashboard' ? 'active' : null }}" id="nav-accountDashboard-tab" href="{{ route('frontend.user.account_dashboard') }}" type="button" role="tab" aria-controls="nav-accountDashboard" aria-selected="false">Account Dashboard</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'account-information' ? 'active' : null }}" id="nav-account-tab" href="{{ route('frontend.user.account_information') }}" type="button" role="tab" aria-controls="nav-account" aria-selected="true">Account Information</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'favorite-articles' ? 'active' : null }}" id="nav-favorite-articles-tab" href="{{ route('frontend.user.favorite_articles') }}" type="button" role="tab" aria-controls="nav-favorite-articles" aria-selected="false">Favorite Articles</a>
        
        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'favorite-businesses' ? 'active' : null }}" id="nav-favorite-businesses-tab" href="{{ route('frontend.user.favorite_businesses') }}" type="button" role="tab" aria-controls="nav-favorite-businesses" aria-selected="false">Favorite Businesses</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'favorite-schools' ? 'active' : null }}" id="nav-favorite-schools-tab" href="{{ route('frontend.user.favorite_schools') }}" type="button" role="tab" aria-controls="nav-favorite-schools" aria-selected="false">Favorite Schools</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'user-events' ? 'active' : null }}" id="nav-events-tab" href="{{ route('frontend.user.user_events') }}" type="button" role="tab" aria-controls="nav-events" aria-selected="false">My Events</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'user-networks' ? 'active' : null }}" id="nav-quotes-tab" href="{{ route('frontend.user.user_networks') }}" type="button" role="tab" aria-controls="nav-quotes" aria-selected="false">My Network Banners</a>

        <a class="nav-link bg-white border-bottom ps-5 w-100 {{ Request::segment(1) == 'user-quotes' ? 'active' : null }}" id="nav-quotes-tab" href="{{ route('frontend.user.user_quotes') }}" type="button" role="tab" aria-controls="nav-quotes" aria-selected="false">My Quotes</a>




    @if(is_business_registered(auth()->user()->id))
        <h5 class="px-3 mt-4 pb-2 mb-0">Businesses</h5>

        <a class="nav-link border-bottom bg-white ps-5 w-100 {{ Request::segment(1) == 'business-dashboard' ? 'active' : null }}" id="nav-business-tab" href="{{ route('frontend.user.business_dashboard') }}" type="button" role="tab" aria-controls="nav-business" aria-selected="true">Business Dashboard</a>

    @endif




    @if(is_school_registered(auth()->user()->id))
        <h5 class="px-3 mt-4 pb-2 mb-0">School Dashboard</h5>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-admission' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_admission') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Admission</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-admission-faq' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_admission_faq') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Admission FAQ</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-contacts' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_contacts') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Contacts</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-financial' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_financial') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Financial</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-financial-faq' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_financial_faq') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Financial FAQ</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-information' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_information') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Information</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-overview' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_overview') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Overview</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-overview-faq' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_overview_faq') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Overview FAQ</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-programs' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_programs') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Programs</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-quick-facts' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_quick_facts') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Quick Facts</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-scholarships' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_scholarships') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Scholarships</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-scholarships-faq' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_scholarships_faq') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Scholarships FAQ</a>

        <a class="nav-link bg-white border-bottom ps-5 w-100 {{ Request::segment(1) == 'suggested-programs' ? 'active' : null }}" id="nav-suggested-programs-tab" href="{{ route('frontend.user.suggested_programs') }}" type="button" role="tab" aria-controls="nav-suggested-programs" aria-selected="false">Suggested Programs</a>

    @endif

    

        <h5 class="px-3 mt-4 pb-2 mb-0">Settings</h5>

        <a class="nav-link border-bottom bg-white ps-5 w-100 {{ Request::segment(1) == 'user-settings' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.user_settings') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Account Settings</a>
    </div>
</div>


