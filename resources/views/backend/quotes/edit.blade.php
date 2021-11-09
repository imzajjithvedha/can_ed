@extends('backend.layouts.app')

@section('title', 'Quote Approval | Admin')

@section('content')
    
    <form action="{{route('admin.quotes.update_quote')}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card quote">
                    <div class="card-body border">
                        <div class="form-group">
                            <label for="quote" class="form-label">Quote</label>
                            <textarea name="quote" class="form-control" id="quote" rows="7" placeholder="Enter your quote..." value="{{ $quote->quote }}" required>{{ $quote->quote }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 p-1">
                <div class="card">
                    <div class="card-body border">
                        <div class="border p-3">
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="Approved" {{ $quote->status == 'Approved' ? "selected" : "" }}>Approve</option>
                                    <option value="Pending" {{ $quote->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $quote->id }}"/>
                                <a href="{{ route('admin.quotes.index') }}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>






<br><br>
@endsection
