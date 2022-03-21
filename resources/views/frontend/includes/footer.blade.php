<div class="container-fluid footer p-5" style="margin-top: 5rem;">
    <div class="container">
        <div class="row text-center">
            <div class="col top-footer">
                <h5 class="p-2 fw-bolder futura mb-4">Proxima Study</h5>
                <!-- <hr> -->
                <a href="{{ route('frontend.about_us') }}">About us</a><br>
                <a href="{{ route('frontend.suggestions') }}">Comments / suggestions</a><br>
                <a href="{{ route('frontend.cookies') }}">Cookies policy</a><br>
                <a href="{{ route('frontend.contact_us') }}">Contact us</a><br>
                <a href="{{ route('frontend.disclaimer') }}">Disclaimer</a><br>
                <a href="{{ route('frontend.faq') }}">FAQ</a><br>
                <a href="{{ route('frontend.meet_our_team') }}">Meet our team</a><br>
                <a href="{{ route('frontend.our_sponsors') }}">Our sponsors</a><br>
                <a href="{{ route('frontend.privacy_policy') }}">Privacy policy</a><br>
                <a href="{{ route('frontend.terms_of_use') }}">Terms of use</a><br>
            </div>

            <div class="col top-footer">
                <h5 class="p-2 fw-bolder futura mb-4">Resources</h5>
                <!-- <hr> -->
                <a href="{{ route('frontend.articles') }}">Articles</a><br>
                <a href="{{ route('frontend.events') }}">Events</a><br>
                <a href="{{ route('frontend.master_application_normal') }}">Master application</a><br>
                <a href="{{ route('frontend.online_business_directory') }}">Online business directory</a><br>
                <a href="{{ route('frontend.programs') }}">Programs</a><br>
                <a href="{{ route('frontend.quotes') }}">Quotes</a><br>
                <a href="{{ route('frontend.videos') }}">Videos</a><br>
                <a href="{{ route('frontend.world_wide_network') }}">World wide networks</a><br>
            </div>

            <div class="col top-footer">
                <h5 class="p-2 fw-bolder futura mb-4">More links</h5>
                <!-- <hr> -->
                <a href="{{ route('frontend.site_map') }}">Site map</a><br>
                <a href="#">link-2</a><br>
                <a href="#">link-3</a><br>
                <a href="#">link-4</a><br>
                <a href="#">link-5</a><br>
                <a href="#">link-6</a><br>
                <a href="#">link-7</a><br>
            </div>

            <div class="col-lg-12 footer-col text-center">
    
                <div class="footer-section footer-about">
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

        
            <div class="text-center mt-2 text-white">
                <p>Copyright © 2006 - 2022, 4R Business Services Inc. All rights reserved</p>
                <!-- <p style="font-size: 0.8rem;">Powered by <a href="https://www.freelancer.com/u/zajjithvedha">Zajjith</a></p> -->
            </div>
        </div>
    </div>
</div>