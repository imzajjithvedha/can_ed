@extends('frontend.layouts.app')

@section('title', 'My Quotes')

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

                @if(count($quotes) == 0)
                    @include('frontend.includes.not_found',[
                        'not_found_title' => 'Quotes not found',
                        'not_found_description' => 'Add quotes in quotes page',
                        'not_found_button_caption' => 'Explore Quotes',
                        'url' => 'quotes'
                    ])

                @else
                    <div class="row justify-content-between">
                        <div class="col-8 p-0">
                            <h4 class="fs-4 fw-bolder user-settings-head">My Quotes</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 border">
                            <div class="px-2 py-3" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                                @foreach($quotes as $quote)
                                    <div class="row justify-content-between align-items-center border py-3 mb-3">
                                        <div class="col-12">
                                            <p class="gray">{{ $quote-> quote}}</p>
                                        
                                            <div class="row justify-content-between mt-3 align-items-center">
                                                <div class="col-4">
                                                    @if($quote->status == 'Approved')
                                                        <h5><span class="badge bg-success">Approved</span></h5>
                                                    @else
                                                        <h5><span class="badge bg-warning text-dark">Pending</span></h5>
                                                    @endif
                                                </div>
                                                <div class="col-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <a type="button" class="btn px-3 rounded-0 text-light py-1" type="button" data-bs-toggle="modal" data-bs-target="#editQuote" onclick="edit({{ $quote->id }})" style="background-color: #4195E1">Edit</a>
                                                        </div>
                                                        <div class="col ps-2">
                                                            <a href="{{ route('frontend.user.user_quote_delete', $quote->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#deleteQuote" style="background-color: #ff2c4b"><i class="fas fa-trash-alt" style="background-color: #ff2c4b!important; padding: 0!important"></i></a>
                                                        </div>
                                                    </div>
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <form action="{{ route('frontend.user.user_quote_update') }}" method="POST">
    {{csrf_field()}}
        <div class="modal fade" id="editQuote" tabindex="-1" aria-labelledby="editQuoteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Quote</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="quote" class="form-label">Quote</label>
                        <textarea name="quote" class="form-control quote" rows="7" value=""></textarea>

                        <p class="mt-3 text-info">Note: If you want to update the already approved quote then we have to approve again. Please consider this before update your quote.</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id" value="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <div class="modal fade" id="deleteQuote" tabindex="-1" aria-labelledby="deleteQuoteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Quote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this quote?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div> 

@endsection


@push('after-scripts')
    <script>
        $('.delete').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>


    <script>
        function edit(id) {
            var settings = {
                "url": "{{url('/')}}/api/user-quotes/get-user-quote/" + id,
                "method": "GET",
                "timeout": 0,
                "dataType": "json",
                };

            $.ajax(settings).done(function (response) {
                $('.quote').val(response['quote']);
                $('.quote').text(response['quote']);
                $('#hidden_id').val(response['id']);
            });
        };

    </script>
@endpush
