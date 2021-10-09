<p>You have a new event request. Below are the details.</p>

<p><strong>Name:</strong> {{ auth()->user()->name }}</p>
<p><strong>Email:</strong> {{ auth()->user()->email }}</p>
<p><strong>Quote:</strong> {{ $details['quote'] }}</p>


<p>Login to your <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">account</a></p>