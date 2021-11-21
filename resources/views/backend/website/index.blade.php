@extends('backend.layouts.app')

@section('title', 'Website information | Admin')

@section('content')
    
    <form action="{{ route('admin.information.update') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <input type="text" id="name" class="form-control" name="name" value="{{ $information->name }}" placeholder="Website Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="mantra" class="form-control" name="mantra" value="{{ $information->mantra }}" placeholder="Website Mantra" required>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Mailing Address</label>
                                <input type="text" class="form-control mb-2" name="address_1" value="{{ $information->address_1 }}" placeholder="1051 Blvd Decarie" required>
                                <input type="text" class="form-control mb-2" name="address_2" value="{{ $information->address_2 }}" placeholder="P.O. Box: 53555 NORGATE" required>
                                <input type="text" class="form-control mb-2" name="address_3" value="{{ $information->address_3 }}" placeholder="Montreal - Qc." required>
                                <input type="text" class="form-control mb-2" name="address_4" value="{{ $information->address_4 }}" placeholder="Canada" required>
                                <input type="text" class="form-control mb-2" name="address_5" value="{{ $information->address_5 }}" placeholder="Postal Code: H4L 3M0" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="telephone" class="form-control" name="telephone" value="{{ $information->telephone }}" placeholder="Telephone" required>
                            </div>
                            <div class="form-group">
                                <input type="email" id="email" class="form-control" name="email" value="{{ $information->email }}" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="url" id="website_url" class="form-control" name="website_url" value="{{ $information->website_url }}" placeholder="Website URL" required>
                            </div>
                            <div class="form-group">
                                <input type="url" id="facebook" class="form-control" name="facebook" value="{{ $information->facebook }}" placeholder="Facebook Link" required>
                            </div>
                            <div class="form-group">
                                <input type="url" id="google" class="form-control" name="google" value="{{ $information->google }}" placeholder="Google Link" required>
                            </div>
                            <div class="form-group">
                                <input type="url" id="you-tube" class="form-control" name="you_tube" value="{{ $information->you_tube }}" placeholder="YouTube Link" required>
                            </div>
                            <div class="form-group">
                                <input type="url" id="instagram" class="form-control" name="instagram" value="{{ $information->instagram }}" placeholder="Instagram Link" required>
                            </div>
                            <div class="form-group">
                                <input type="url" id="twitter" class="form-control" name="twitter" value="{{ $information->twitter }}" placeholder="Twitter Link" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="text-center">
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


@push('after-scripts')
    
@endpush

