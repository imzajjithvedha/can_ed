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
        <title>@yield('title', 'Proxima Study | Your future begins here')</title>
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <script src="https://kit.fontawesome.com/31844209f8.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css"/>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
        <link href="http://kendo.cdn.telerik.com/2014.2.716/styles/kendo.common.min.css" rel="stylesheet" />
        <link href="http://kendo.cdn.telerik.com/2014.2.716/styles/kendo.default.min.css" rel="stylesheet" />

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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        

        <script src="http://kendo.cdn.telerik.com/2014.2.716/js/jquery.min.js"></script>
        <script src="http://kendo.cdn.telerik.com/2014.2.716/js/kendo.ui.core.min.js"></script>

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


    <!-- JavaScript for disabling form submissions if there are invalid fields -->
    <script>
        $( "form" ).each(function() {
    var form = this;

    // Suppress the default bubbles
    form.addEventListener( "invalid", function( event ) {
        event.preventDefault();
    }, true );

    // Support Safari, iOS Safari, and the Android browser—each of which do not prevent
    // form submissions by default
    $( form ).on( "submit", function( event ) {
        if ( !this.checkValidity() ) {
            event.preventDefault();
        }
    });

    $( "input, select, textarea", form )
        // Destroy the tooltip on blur if the field contains valid data
        .on( "blur", function() {
            var field = $( this );
            if ( field.data( "kendoTooltip" ) ) {
                if ( this.validity.valid ) {
                    field.kendoTooltip( "destroy" );
                } else {
                    field.kendoTooltip( "hide" );
                }
            }
        })
        // Show the tooltip on focus
        .on( "focus", function() {
            var field = $( this );
            if ( field.data( "kendoTooltip" ) ) {
                field.kendoTooltip( "show" );
            }
        });

    $( "button:not([type=button]), input[type=submit]", form ).on( "click", function( event ) {
        // Destroy any tooltips from previous runs
        $( "input, select, textarea", form ).each( function() {
            var field = $( this );
            if ( field.data( "kendoTooltip" ) ) {
                field.kendoTooltip( "destroy" );
            }
        });

        // Add a tooltip to each invalid field
        var invalidFields = $( ":invalid", form ).each(function() {
            var field = $( this ).kendoTooltip({
                content: function() {
                    return field[ 0 ].validationMessage;
                },
                position:'bottom',
            });
        });

        // If there are errors, give focus to the first invalid field
        invalidFields.first().trigger( "focus" ).eq( 0 ).focus();
    });
});
    </script>

        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>
