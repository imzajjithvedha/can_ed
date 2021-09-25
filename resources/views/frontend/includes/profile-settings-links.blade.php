<div class="border">

    <div class="nav flex-column profile-settings align-items-start justify-content-start" id="nav-tab" role="tablist">

        <h5 class="px-3 mt-4 pb-2 mb-0">My Account</h5>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'account-dashboard' ? 'active' : null }}" id="nav-accountDashboard-tab" href="{{ route('frontend.user.account_dashboard') }}" type="button" role="tab" aria-controls="nav-accountDashboard" aria-selected="false">Account Dashboard</a>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'account-information' ? 'active' : null }}" id="nav-account-tab" href="{{ route('frontend.user.account_information') }}" type="button" role="tab" aria-controls="nav-account" aria-selected="true">Account Information</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'user-events' ? 'active' : null }}" id="nav-events-tab" href="{{ route('frontend.user.user_events') }}" type="button" role="tab" aria-controls="nav-events" aria-selected="false">My Events</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'favorite-articles' ? 'active' : null }}" id="nav-favorite-articles-tab" href="{{ route('frontend.user.favorite_articles') }}" type="button" role="tab" aria-controls="nav-favorite-articles" aria-selected="false">Favorite Articles</a>
        
        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'favorite-businesses' ? 'active' : null }}" id="nav-favorite-businesses-tab" href="{{ route('frontend.user.favorite_businesses') }}" type="button" role="tab" aria-controls="nav-favorite-businesses" aria-selected="false">Favorite Businesses</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'favorite-schools' ? 'active' : null }}" id="nav-favorite-schools-tab" href="{{ route('frontend.user.favorite_schools') }}" type="button" role="tab" aria-controls="nav-favorite-schools" aria-selected="false">Favorite Schools</a>

        <a class="nav-link bg-white border-0 ps-5 w-100 {{ Request::segment(1) == 'user-quotes' ? 'active' : null }}" id="nav-quotes-tab" href="{{ route('frontend.user.user_quotes') }}" type="button" role="tab" aria-controls="nav-quotes" aria-selected="false">My Quotes</a>

        <a class="nav-link bg-white border-bottom ps-5 w-100 {{ Request::segment(1) == 'user-networks' ? 'active' : null }}" id="nav-quotes-tab" href="{{ route('frontend.user.user_networks') }}" type="button" role="tab" aria-controls="nav-quotes" aria-selected="false">My Network Banners</a>




    @if(is_school_registered(auth()->user()->id))
        <h5 class="px-3 mt-4 pb-2 mb-0">School Dashboard</h5>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'school-dashboard' ? 'active' : null }}" id="nav-school-tab" href="{{ route('frontend.user.school_dashboard') }}" type="button" role="tab" aria-controls="nav-school" aria-selected="true">School Information</a>


        <a class="nav-link bg-white border-bottom ps-5 w-100 {{ Request::segment(1) == 'suggested-programs' ? 'active' : null }}" id="nav-suggested-programs-tab" href="{{ route('frontend.user.suggested_programs') }}" type="button" role="tab" aria-controls="nav-suggested-programs" aria-selected="false">Suggested Programs</a>

    @endif

    @if(is_business_registered(auth()->user()->id))
        <h5 class="px-3 mt-4 pb-2 mb-0">Businesses</h5>

        <a class="nav-link border-0 bg-white ps-5 w-100 {{ Request::segment(1) == 'business-dashboard' ? 'active' : null }}" id="nav-business-tab" href="{{ route('frontend.user.business_dashboard') }}" type="button" role="tab" aria-controls="nav-business" aria-selected="true">Business Dashboard</a>

    @endif
    </div>
</div>


