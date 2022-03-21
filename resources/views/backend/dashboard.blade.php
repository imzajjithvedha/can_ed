@extends('backend.layouts.app')

@section('title', 'Proxima Study | Admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>@lang('strings.backend.dashboard.welcome') {{ $logged_in_user->name }}!</strong>
                </div>
                <div class="card-body">
                    {!! __('strings.backend.welcome') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
