@extends('frontend.layouts.app')

@section('title', 'Proxima Study | My account dashboard' )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <h4 class="user-settings-head">Account dashboard</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="py-3" id="nav-dashboard" role="tabpanel" aria-labelledby="nav-dashboard-tab">
                            <div class="row">
                                <div class="col-4 mb-4">
                                    <div class="card text-center">
                                        <div class="card-img-top text-center">
                                            <p class="display-3 mt-4 p-4 account-dashboard-cards">{{ sprintf("%02d", $events) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('frontend.user.user_events') }}" class="card-title text-decoration-none" style="color: #0d6efd;">My events</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 mb-4">
                                    <div class="card text-center">
                                        <div class="card-img-top text-center">
                                            <p class="display-3 mt-4 p-4 account-dashboard-cards">{{ sprintf("%02d", $articles) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('frontend.user.favorite_articles') }}" class="card-title text-decoration-none" style="color: #0d6efd;">Favorite articles</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 mb-4">
                                    <div class="card text-center">
                                        <div class="card-img-top text-center">
                                            <p class="display-3 mt-4 p-4 account-dashboard-cards">{{ sprintf("%02d", $businesses) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('frontend.user.favorite_businesses') }}" class="card-title text-decoration-none" style="color: #0d6efd;">Favorite businesses</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 mb-4">
                                    <div class="card text-center">
                                        <div class="card-img-top text-center">
                                            <p class="display-3 mt-4 p-4 account-dashboard-cards">{{ sprintf("%02d", $favorite_events) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('frontend.user.favorite_events') }}" class="card-title text-decoration-none" style="color: #0d6efd;">Favorite events</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 mb-4">
                                    <div class="card text-center">
                                        <div class="card-img-top text-center">
                                            <p class="display-3 mt-4 p-4 account-dashboard-cards">{{ sprintf("%02d", $scholarships) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('frontend.user.favorite_scholarships') }}" class="card-title text-decoration-none" style="color: #0d6efd;">Favorite scholarships</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 mb-4">
                                    <div class="card text-center">
                                        <div class="card-img-top text-center">
                                            <p class="display-3 mt-4 p-4 account-dashboard-cards">{{ sprintf("%02d", $schools) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('frontend.user.favorite_schools') }}" class="card-title text-decoration-none" style="color: #0d6efd;">Favorite schools</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card text-center">
                                        <div class="card-img-top text-center">
                                            <p class="display-3 mt-4 p-4 account-dashboard-cards">{{ sprintf("%02d", $networks) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('frontend.user.user_networks') }}" class="card-title text-decoration-none" style="color: #0d6efd;">My networks</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card text-center">
                                        <div class="card-img-top text-center">
                                            <p class="display-3 mt-4 p-4 account-dashboard-cards">{{ sprintf("%02d", $quotes) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('frontend.user.user_quotes') }}" class="card-title text-decoration-none" style="color: #0d6efd;">My quotes</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card text-center">
                                        <div class="card-img-top text-center">
                                            <p class="display-3 mt-4 p-4 account-dashboard-cards">{{ sprintf("%02d", $suggested_programs) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('frontend.user.suggested_programs') }}" class="card-title text-decoration-none" style="color: #0d6efd;">Suggested programs</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

