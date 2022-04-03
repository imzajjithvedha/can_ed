<p>You have an existing virtual tour's update request. Below are the details.</p>

<p><strong>School name:</strong> {{ App\Models\Schools::where('id', $details['school_id'])->first()->name }}</p>
<p><strong>City:</strong> {{ $details['city'] }}</p>
<p><strong>Province:</strong> {{ $details['province'] }}</p>
<p><strong>Country:</strong> {{ $details['country'] }}</p>
<p><strong>Link:</strong> {{ $details['url'] }}</p>


<p>Login to your <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">account</a></p>

