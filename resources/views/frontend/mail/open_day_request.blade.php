<p>You have a new school open day request. Below are the details.</p>

<p><strong>School name:</strong> {{ App\Models\Schools::where('id', $details['school_id'])->first()->name }}</p>
<p><strong>Title:</strong> {{ $details['title'] }}</p>
<p><strong>Description:</strong> {{ $details['description'] }}</p>
<p><strong>Address:</strong> {{ $details['address'] }}</p>
<p><strong>City:</strong> {{ $details['city'] }}</p>
<p><strong>Country:</strong> {{ $details['country'] }}</p>
<p><strong>Date:</strong> {{ $details['date'] }}</p>
<p><strong>Time:</strong> {{ $details['time'] }}</p>
<p><strong>School email:</strong> {{ $details['school_email'] }}</p>
<p><strong>School phone:</strong> {{ $details['school_phone'] }}</p>
<p><strong>Link:</strong> {{ $details['url'] }}</p>


<p>Login to your <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">account</a></p>

