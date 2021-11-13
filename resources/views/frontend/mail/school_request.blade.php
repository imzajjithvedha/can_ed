<p>You have a new school request. Below are the details.</p>

<p><strong>School name:</strong> {{ $details['name'] }}</p>
<p><strong>Website URL:</strong> {{ $details['website'] }}</p>
<p><strong>Country:</strong> {{ $details['country'] }}</p>
<p><strong>User name:</strong> {{ auth()->user()->name }}</p>
<p><strong>Email:</strong> {{ $details['user_email'] }}</p>
<p><strong>Phone:</strong> {{ $details['user_phone'] }}</p>
<p><strong>Reach time:</strong> {{ $details['reach_time'] }}</p>
<p><strong>Time zone:</strong> {{ $details['time_zone'] }}</p>
<p><strong>Message:</strong> {{ $details['message'] }}</p>


<p>Login to your <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">account</a></p>

