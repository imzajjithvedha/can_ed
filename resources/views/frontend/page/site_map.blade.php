@extends('frontend.layouts.app')

@section('title', 'Site Map')

@push('after-styles')
    <link href="{{ url('css/site_map.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container sitemap" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h5 class="fw-bolder">Site Map</h5>
        <hr>

        <div class="row">
            <div class="col-3">
                <h6 class="fw-bold mb-2">Study in Canada</h6>
                <a href="{{route('frontend.index')}}" class="gray text-decoration-none">Home</a>
                <a href="{{route('frontend.about_us')}}" class="gray text-decoration-none">About Us</a>
                <a href="{{route('frontend.contact_us')}}" class="gray text-decoration-none">Contact Us</a>
                <a href="{{route('frontend.articles')}}" class="gray text-decoration-none">Articles</a>
                <a href="{{route('frontend.faq')}}" class="gray text-decoration-none">Frequently Asked Questions</a>
                <a href="{{route('frontend.meet_our_team')}}" class="gray text-decoration-none">Meet our Team</a>
                <a href="{{route('frontend.our_sponsors')}}" class="gray text-decoration-none">Our Sponsors</a>
                <a href="{{route('frontend.privacy_policy')}}" class="gray text-decoration-none">Privacy Policy</a>
                <a href="{{route('frontend.disclaimer')}}" class="gray text-decoration-none">Disclaimer</a>
            </div>

            <div class="col-3">
                <h6 class="fw-bold mb-2">For Students</h6>
                <a href="{{route('frontend.schools')}}" class="gray text-decoration-none">Schools</a>
                <a href="{{route('frontend.programs')}}" class="gray text-decoration-none">Programs</a>
                <a href="{{route('frontend.careers')}}" class="gray text-decoration-none">Careers</a>
                <a href="{{route('frontend.auth.register')}}" class="gray text-decoration-none">Registration</a>
                <a href="{{route('frontend.user.account_dashboard')}}" class="gray text-decoration-none">User Dashboard</a>
                <a href="{{route('frontend.events')}}" class="gray text-decoration-none">Events</a>
                <a href="{{route('frontend.business_categories')}}" class="gray text-decoration-none">Business Categories</a>
                <a href="{{route('frontend.contact_us')}}" class="gray text-decoration-none">Ask a Question</a>
            </div>

            <div class="col-3">
                <h6 class="fw-bold mb-2">For Schools</h6>
                <a href="{{route('frontend.schools')}}" class="gray text-decoration-none">Schools</a>
                <a href="{{route('frontend.auth.register')}}" class="gray text-decoration-none">Registration</a>
                <a href="{{route('frontend.user.school_information')}}" class="gray text-decoration-none">School Dashboard</a>
                <a href="{{route('frontend.contact_us')}}" class="gray text-decoration-none">Ask a Question</a>
            </div>

            <div class="col-3">
                <h6 class="fw-bold mb-2">For Businesses</h6>
                <a href="{{route('frontend.business_categories')}}" class="gray text-decoration-none">Business Categories</a>
                <a href="{{route('frontend.auth.register')}}" class="gray text-decoration-none">Registration</a>
                <a href="{{route('frontend.user.business_dashboard')}}" class="gray text-decoration-none">Business Dashboard</a>
                <a href="{{route('frontend.contact_us')}}" class="gray text-decoration-none">Ask a Question</a>
            </div>
        </div>
    </div>
@endsection
