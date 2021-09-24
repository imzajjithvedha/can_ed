<footer class="app-footer">
    <div>
        <!-- <strong>@lang('labels.general.copyright') &copy; {{ date('Y') }}
            <a href="http://laravel-boilerplate.com">
                @lang('strings.backend.general.boilerplate_link')
            </a>
        </strong> @lang('strings.backend.general.all_rights_reserved') -->

        <strong>@lang('labels.general.copyright') &copy; {{ date('Y') }}
            <a href="{{ route('frontend.index') }}">
                Study in Canada
            </a>
        </strong> @lang('strings.backend.general.all_rights_reserved')
    </div>

    <!-- <div class="ml-auto">Theme by <a href="http://coreui.io">CoreUI</a></div> -->
    <div class="ml-auto">Powered by <a href="https://www.freelancer.com/u/zajjithvedha">Zajjith</a></div>
</footer>
