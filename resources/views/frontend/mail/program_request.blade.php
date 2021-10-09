<p>You have a new program suggestion. Below are the details.</p>

<p><strong>Name:</strong> {{ $details['name'] }}</p>

@if($details['description'] != null)
    <p><strong>Description:</strong> {{ $details['description'] }}</p>
@else
    <p><strong>Description:</strong> <i>Not provided by user.</i></p>
@endif


<p>Login to your <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">account</a></p>

