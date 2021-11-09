

<div class="container-fluid navigation-links mt-5 pt-4" style="padding-bottom: 5rem;">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h6 class="p-2 fw-bolder">Study in Canada</h6>
                <hr>
                <a href="{{ route('frontend.about_us') }}">About us</a><br>
                <a href="{{ route('frontend.suggestions') }}">Comments / suggestions</a><br>
                <a href="{{ route('frontend.contact_us') }}">Contact us</a><br>
                <a href="{{ route('frontend.disclaimer') }}">Disclaimer</a><br>
                <a href="{{ route('frontend.faq') }}">FAQ</a><br>
                <a href="{{ route('frontend.meet_our_team') }}">Meet our team</a><br>
                <a href="{{ route('frontend.our_sponsors') }}">Our sponsors</a><br>
                <a href="{{ route('frontend.privacy_policy') }}">Privacy policy</a><br>
            </div>

            <div class="col">
                <h6 class="p-2 fw-bolder">Resources</h6>
                <hr>
                <a href="{{ route('frontend.articles') }}">Articles</a><br>
                <a href="{{ route('frontend.events') }}">Events</a><br>
                <a href="{{ route('frontend.online_business_directory') }}">Online business directory</a><br>
                <a href="{{ route('frontend.quotes') }}">Quotes</a><br>
                <a href="{{ route('frontend.videos') }}">Videos</a><br>
                <a href="{{ route('frontend.world_wide_network') }}">World wide networks</a><br>
            </div>

            <div class="col">
                <h6 class="p-2 fw-bolder">Lorem</h6>
                <hr>
                <a href="#">link-1</a><br>
                <a href="#">link-2</a><br>
                <a href="#">link-3</a><br>
                <a href="#">link-4</a><br>
                <a href="#">link-5</a><br>
                <a href="#">link-6</a><br>
                <a href="#">link-7</a><br>
            </div>

            <!-- <div class="col-3">
                <h6 class="p-2 fw-bolder">Subscribe our newsletter</h6>
                <hr>
                <div class="row">
                    <div class="col-7 pe-0">
                        <input type="email" class="form-control" id="subscribe_email" aria-describedby="email" placeholder="Your email">
                    </div>
                    <div class="col-5 ps-0">
                        <button class="btn text-white" style="background-color: #dc3545">Subscribe</button>
                    </div>
                </div>
            </div> -->


            <!-- <div class="col-2 text-center">
                <a href="{{ route('frontend.index') }}" class="footer-logo"><img src="{{ url('img/frontend/logo.png') }}" alt="" class="img-fluid mb-3" style="height: 8rem;"></a>
                <a href="{{ route('frontend.site_map') }}">Site Map</a>
            </div> -->
        </div>
    </div>
</div>


<div class="container-fluid footer p-4">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center footer-top-nav">
                <a href="{{ route('frontend.index') }}" class="px-2 border-end d-inline-block px-3">Home</a>
                <a href="{{ route('frontend.disclaimer') }}" class="px-2 border-end d-inline-block px-3">Disclaimer</a>
                <a href="{{ route('frontend.online_business_directory') }}" class="px-2 border-end d-inline-block px-3">Online business directory</a>
                <a href="{{ route('frontend.privacy_policy') }}" class="px-2 border-end d-inline-block px-3">Privacy policy</a>
                <a href="{{ route('frontend.contact_us') }}" class="px-2 border-end d-inline-block px-3">Comments / suggestion</a>
                <a href="{{ route('frontend.site_map') }}" class="px-2 border-end d-inline-block px-3">Site map</a>
                <a href="{{ route('frontend.contact_us') }}" class="px-2 border-end d-inline-block px-3" style="border-right:none!important;">Contact us</a>
            </div>

            <div class="col-lg-12 footer_col text-center">
    
                <div class="footer_section footer_about">
                    <div class="footer_social">
                        <ul>
                            <li class="fb"><a href="{{ App\Models\WebsiteInformation::where('id', 1)->first()->facebook }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li class="gp"><a href="{{ App\Models\WebsiteInformation::where('id', 1)->first()->google }}" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li class="yt"><a href="{{ App\Models\WebsiteInformation::where('id', 1)->first()->you_tube }}" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            <li class="ig"><a href="{{ App\Models\WebsiteInformation::where('id', 1)->first()->instagram }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li class="tw"><a href="{{ App\Models\WebsiteInformation::where('id', 1)->first()->twitter }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        
            <div class="text-center mt-3 text-white">
                <p>Copyright © 2006 - 2021, 4R Business Services Inc. All rights reserved</p>
                <!-- <p style="font-size: 0.8rem;">Powered by <a href="https://www.freelancer.com/u/zajjithvedha">Zajjith</a></p> -->
            </div>
        </div>
    </div>
</div>