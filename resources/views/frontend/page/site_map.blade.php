@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Site map')

@push('after-styles')
    <link href="{{ url('css/site_map.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container sitemap" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">Site map</h4>
        <hr>

        <div class="row">
            <div class="col-3">
                <h5 class="fw-bold mb-2 futura">Proxima Study</h5>
                <a href="{{route('frontend.about_us')}}" class="gray text-decoration-none">About us</a>
                <a href="{{ route('frontend.articles', 'basic-articles') }}" class="gray text-decoration-none">Articles</a>
                <a href="{{route('frontend.contact_us')}}" class="gray text-decoration-none">Contact us</a>
                <a href="{{route('frontend.disclaimer')}}" class="gray text-decoration-none">Disclaimer</a>
                <a href="{{route('frontend.faq')}}" class="gray text-decoration-none">Frequently asked questions</a>
                <a href="{{route('frontend.index')}}" class="gray text-decoration-none">Home page</a>
                <a href="{{route('frontend.meet_our_team')}}" class="gray text-decoration-none">Meet our team</a>
                <a href="{{route('frontend.our_sponsors')}}" class="gray text-decoration-none">Our sponsors</a>
                <a href="{{route('frontend.privacy_policy')}}" class="gray text-decoration-none">Privacy policy</a>
            </div>

            <div class="col-3">
                <h5 class="fw-bold mb-2 futura">For students</h5>
                <a href="{{route('frontend.contact_us')}}" class="gray text-decoration-none">Ask a question</a>
                <a href="{{route('frontend.business_categories')}}" class="gray text-decoration-none">Business categories</a>
                <a href="{{route('frontend.careers')}}" class="gray text-decoration-none">Careers</a>
                <a href="{{route('frontend.events')}}" class="gray text-decoration-none">Events</a>
                <a href="{{route('frontend.master_application_normal')}}" class="gray text-decoration-none">Master application</a>
                <a href="{{route('frontend.programs')}}" class="gray text-decoration-none">Programs</a>
                <a href="{{route('frontend.auth.register')}}" class="gray text-decoration-none">Registration</a>
                <a href="{{route('frontend.school_degree_levels')}}" class="gray text-decoration-none">Schools</a>
                <a href="{{route('frontend.user.account_dashboard')}}" class="gray text-decoration-none">User dashboard</a>
            </div>

            <div class="col-3">
                <h5 class="fw-bold mb-2 futura">For schools</h5>
                <a href="{{route('frontend.contact_us')}}" class="gray text-decoration-none">Ask a question</a>
                <a href="{{route('frontend.auth.register')}}" class="gray text-decoration-none">Registration</a>
                <a href="{{route('frontend.school_degree_levels')}}" class="gray text-decoration-none">Schools</a>

                @auth
                    @if(is_school_registered(auth()->user()->id))
                        <a href="{{route('frontend.user.school_information')}}" class="gray text-decoration-none">School dashboard</a>
                    @endif
                @elseguest
                    <a href="{{route('frontend.user.school_information')}}" class="gray text-decoration-none">School dashboard</a>
                @endauth
            </div>

            <div class="col-3">
                <h5 class="fw-bold mb-2 futura">For businesses</h5>
                <a href="{{route('frontend.contact_us')}}" class="gray text-decoration-none">Ask a question</a>
                <a href="{{route('frontend.business_categories')}}" class="gray text-decoration-none">Business categories</a>
                @auth
                    @if(is_business_registered(auth()->user()->id))
                        <a href="{{route('frontend.user.business_dashboard')}}" class="gray text-decoration-none">Business dashboard</a>
                    @endif
                @elseguest
                    <a href="{{route('frontend.user.business_dashboard')}}" class="gray text-decoration-none">Business dashboard</a>
                @endauth
                <a href="{{route('frontend.auth.register')}}" class="gray text-decoration-none">Registration</a>
            </div>
        </div>
    </div>
@endsection
