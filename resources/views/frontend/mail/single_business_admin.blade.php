<p><a href="{{ route('frontend.single_business', $details['business_id']) }}" class="text-decoration-none">{{ App\Models\Businesses::where('id', $details['business_id'])->first()->name }}</a> business was contacted by an user. Below are the user details and message.</p>

<p><strong>Name:</strong> {{ $details['name'] }}</p>

<p><strong>Email:</strong> {{ $details['email'] }}</p>

<p><strong>Message:</strong> {{ $details['message'] }}</p>



<p>Below are the business owner details.</p>

<p><strong>Name:</strong> {{ App\Models\Businesses::where('id', $details['business_id'])->first()->contact_name }}</p>

<p><strong>Email:</strong> {{ App\Models\Businesses::where('id', $details['business_id'])->first()->email }}</p>

<p><strong>Phone:</strong> {{ App\Models\Businesses::where('id', $details['business_id'])->first()->phone }}</p>



<p>Login to your <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">account</a></p>

