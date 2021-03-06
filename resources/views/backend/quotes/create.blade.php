@extends('backend.layouts.app')

@section('title', __('Create new quote | Admin'))

@section('content')



    <form action="{{ route('admin.quotes.store_quote') }}" method="post" enctype="multipart/form-data" novalidate>
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border">
                        <div class="form-group">
                            <textarea name="quote" class="form-control" id="quote" rows="7" placeholder="Enter your quote..." required></textarea>
                        </div>
                    </div>
                </div>

                <div class="text-center mb-5">
                    <button type="submit" class="btn btn-success">Create new</button><br>
                </div>
            </div>    
        </div>
    </form>

@endsection
