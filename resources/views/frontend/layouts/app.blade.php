<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="app-url" content="{{ getBaseURL() }}">
        <meta name="file-base-url" content="{{ getFileBaseURL() }}">
        <title>@yield('title', 'Proxima Study - Your future begins here')</title>
        <link rel="icon" href="{{ url('img/frontend/logo.png') }}"/>
        <meta name="description" content="@yield('meta_description', 'Laravel Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <link rel="stylesheet" href="{{ url('css/aiz-core.css') }}">    
        <link rel="stylesheet" href="{{ url('css/vendors.css') }}"> 

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href="{{ url('css/styles.css') }}" rel="stylesheet">
        <script src="https://kit.fontawesome.com/aa4e69f91b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css"/>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

        <link href="{{ url('css/bulma-calendar.min.css') }}" rel="stylesheet">
        

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(mix('css/frontend.css')) }}

        @stack('after-styles')
    </head>
    <body>
        @include('includes.partials.read-only')

        @include('cookieConsent::index')

        <div id="app" class="position-relative">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            <div style="margin-top: 12rem;">
                <!-- @include('includes.partials.messages') -->
                @yield('content')
            </div>


            <div style="position:fixed; bottom: 0.8rem; right:0.8rem">
                <button class="btn" style="background-color: rgb(255 255 255 / 69%); color: black; cursor: pointer; z-index: 1; border-radius: 30px; padding: 10px 15px;" onclick="to_top()"><i class="fas fa-arrow-up"></i></button>
            </div>

            @include('frontend.includes.footer')

        </div>

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        {!! script(mix('js/frontend.js')) !!}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <script src="{{ url('js/bulma-calendar.min.js') }}"></script>

        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        </script>
        
        
        <script>
            function to_top() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        </script>

    <script>
        var AIZ = AIZ || {};

        AIZ.local = {
            nothing_selected: 'Nothing selected',
            nothing_found: 'Nothing found',
            choose_file: 'Choose file',
            file_selected: 'File selected',
            files_selected: 'Files selected',
            add_more_files: 'Add more files',
            adding_more_files: 'Adding more files',
            drop_files_here_paste_or: 'Drop files here, paste or',
            browse: 'Browse',
            upload_complete: 'Upload complete',
            upload_paused: 'Upload paused',
            resume_upload: 'Resume upload',
            pause_upload: 'Pause upload',
            retry_upload: 'Retry upload',
            cancel_upload: 'Cancel upload',
            uploading: 'Uploading',
            processing: 'Processing',
            complete: 'Complete',
            file: 'File',
            files: 'Files',
        }

    </script>

    <script src="{{url('js/vendors.js')}}"></script>
    <script src="{{url('js/aiz-core.js')}}"></script>

    <script>
        $('input[type=url]').on('click', function() {
            string = $(this).val();

            if(!(/^https:\/\//.test(string))){
                string = "https://" + string;
            }

            if(string == '') {
                string = "https://";
            }

            // if(string == 'https://') {
            //     string = null;
            // }
            
            $(this).val(string);
        });
    </script>

        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>
