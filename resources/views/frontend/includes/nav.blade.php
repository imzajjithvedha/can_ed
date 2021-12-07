<div class="fixed-top menu-nav">
    <div class="container-fluid py-2 text-white top-nav">
        <div class="container">
            <div class="row justify-content-end" id="navbarSupportedContent">
                <div class="col-8 text-end">
                    <div class="logo position-relative">
                        <a href="{{ route('frontend.index') }}"><img src="{{ url('img/frontend/logo.png') }}" alt="" class="img-fluid position-absolute"></a>
                    </div>
                    <ul class="me-auto nav justify-content-end">
                        @auth
                            <li class="nav-item border-end px-2 border-end">
                                <a class="nav-link text-white" aria-current="page" href="{{ route('frontend.school_register') }}">Register a school</a>
                            </li>
                            <li class="nav-item border-end px-2 border-end">
                                <a class="nav-link text-white" href="{{ route('frontend.business_register') }}">Register a business</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link dropdown-toggle" href="{{route('frontend.auth.login')}}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  @if(auth()->user()->display_name != null)
                                    <span class="text-white user-name">{{auth()->user()->display_name}}</span>
                                  @else
                                    <span class="text-white user-name">{{auth()->user()->first_name}}</span>
                                  @endif
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('frontend.user.account_dashboard') }}">My account</a>
                                    <a class="dropdown-item" href="{{route('frontend.auth.logout')}}">Log out</a>
                                  </div>
                            </li>
                        @else
                            <li class="nav-item border-end px-2 border-end">
                                <a class="nav-link text-white" aria-current="page" href="{{ route('frontend.auth.login') }}">Register a school</a>
                            </li>
                            <li class="nav-item border-end px-2 border-end">
                                <a class="nav-link text-white" href="{{ route('frontend.auth.login') }}">Register a business</a>
                            </li>
                            <li class="nav-item ps-2 pe-0">
                                <a class="nav-link text-white" href="{{ route('frontend.auth.login') }}">Log in</a>
                            </li>
                        @endauth
                        
                    </ul>
                </div>
            </div> 
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bottom-nav py-3">
        <div class="container">
          <a class="navbar-brand text-center text-white fw-bold futura" href="{{ route('frontend.index') }}" style="font-size:35px; line-height:0.75; letter-spacing: 2px;">{{ App\Models\WebsiteInformation::where('id', 1)->first()->name }} <br> <span class="futura" style="font-size:16px;">{{ App\Models\WebsiteInformation::where('id', 1)->first()->mantra }}</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item border-end border-2">
                <a class="nav-link text-white" aria-current="page" href="{{ route('frontend.schools') }}">Schools</a>
              </li>
              <li class="nav-item border-end border-2">
                <a class="nav-link text-white" href="{{ route('frontend.programs') }}">Programs</a>
              </li>
              <li class="nav-item border-end border-2">
                <a class="nav-link text-white" href="{{ route('frontend.business_categories') }}">Businesses</a>
              </li>
              <li class="nav-item border-end border-2">
                <a class="nav-link text-white" href="{{ route('frontend.careers') }}">Careers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('frontend.jobs') }}">Jobs</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
</div>