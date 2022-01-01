<div class="border">

    <div class="nav flex-column profile-settings align-items-start justify-content-start" id="nav-tab" role="tablist">

        <h4 class="px-3 mt-4 pb-2 mb-0 futura">My account</h4>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'account-dashboard' ? 'active' : null }} futura" id="nav-accountDashboard-tab" href="{{ route('frontend.user.account_dashboard') }}" type="button" role="tab" aria-controls="nav-accountDashboard" aria-selected="false">Account dashboard</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'account-information' ? 'active' : null }} futura" id="nav-account-tab" href="{{ route('frontend.user.account_information') }}" type="button" role="tab" aria-controls="nav-account" aria-selected="true">Account information</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'favorite-articles' ? 'active' : null }} futura" id="nav-favorite-articles-tab" href="{{ route('frontend.user.favorite_articles') }}" type="button" role="tab" aria-controls="nav-favorite-articles" aria-selected="false">Favorite articles</a>
        
        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'favorite-businesses' ? 'active' : null }} futura" id="nav-favorite-businesses-tab" href="{{ route('frontend.user.favorite_businesses') }}" type="button" role="tab" aria-controls="nav-favorite-businesses" aria-selected="false">Favorite businesses</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'favorite-events' ? 'active' : null }} futura" id="nav-favorite-events-tab" href="{{ route('frontend.user.favorite_events') }}" type="button" role="tab" aria-controls="nav-favorite-events" aria-selected="false">Favorite events</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'favorite-schools' ? 'active' : null }} futura" id="nav-favorite-schools-tab" href="{{ route('frontend.user.favorite_schools') }}" type="button" role="tab" aria-controls="nav-favorite-schools" aria-selected="false">Favorite schools</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'user-events' ? 'active' : null }} futura" id="nav-events-tab" href="{{ route('frontend.user.user_events') }}" type="button" role="tab" aria-controls="nav-events" aria-selected="false">My events</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'user-networks' ? 'active' : null }} futura" id="nav-quotes-tab" href="{{ route('frontend.user.user_networks') }}" type="button" role="tab" aria-controls="nav-quotes" aria-selected="false">My network banners</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'user-quotes' ? 'active' : null }} futura" id="nav-quotes-tab" href="{{ route('frontend.user.user_quotes') }}" type="button" role="tab" aria-controls="nav-quotes" aria-selected="false">My quotes</a>

        <a class="nav-link bg-white border-bottom ps-5 w-100 {{ Request::segment(1) == 'suggested-programs' ? 'active' : null }} futura" id="nav-suggested-programs-tab" href="{{ route('frontend.user.suggested_programs') }}" type="button" role="tab" aria-controls="nav-suggested-programs" aria-selected="false">Suggested programs</a>




    @if(is_business_registered(auth()->user()->id))
        <h4 class="px-3 mt-4 pb-2 mb-0 futura">Businesses</h4>

        <a class="nav-link border-bottom bg-white ps-5 w-100 {{ Request::segment(1) == 'business-dashboard' ? 'active' : null }} futura" id="nav-business-tab" href="{{ route('frontend.user.business_dashboard') }}" type="button" role="tab" aria-controls="nav-business" aria-selected="true">Business dashboard</a>

    @endif




    @if(is_school_registered(auth()->user()->id))
        <h4 class="px-3 mt-4 pb-2 mb-0 futura">School dashboard</h4>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-admission' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.school_admission') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Admission</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-admission-faq' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.school_admission_faq') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Admission FAQ</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-contacts' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.school_contacts') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Contacts</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-financial' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.school_financial') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Financial</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-financial-faq' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.school_financial_faq') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Financial FAQ</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-information' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.school_information') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Information</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-overview' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.school_overview') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Overview</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-overview-faq' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.school_overview_faq') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Overview FAQ</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-programs' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.school_programs') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Programs</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-quick-facts' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.school_quick_facts') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Quick facts</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-scholarships' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.school_scholarships') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Scholarships</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-scholarships-faq' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.school_scholarships_faq') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Scholarships FAQ</a>

        <a class="nav-link border-bottom bg-white ps-5 w-100 {{ Request::segment(1) == 'school-settings' ? 'active' : null }} futura" id="nav-settings-tab" href="{{ route('frontend.user.school_settings') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">School settings</a>

    @endif

    

        <h4 class="px-3 mt-4 pb-2 mb-0 futura">Account settings</h4>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'user-password' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.user_password') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Update password</a>

        <a class="nav-link border-bottom bg-white ps-5 w-100 {{ Request::segment(1) == 'user-account' ? 'active' : null }} futura" id="nav-school-tab" href="{{ route('frontend.user.user_account') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">Close my account</a>
    </div>
</div>


