<p>Hello, {{ App\Models\Businesses::where('id', $details['business_id'])->first()->contact_name }}</p>

<p>You have a new business contact request from <a href="{{ route('frontend.single_business', $details['business_id']) }}" class="text-decoration-none">{{ App\Models\Businesses::where('id', $details['business_id'])->first()->name }}</a> business. Below are the details of the person.</p>

<p><strong>Name:</strong> {{ $details['name'] }}</p>

<p><strong>Email:</strong> {{ $details['email'] }}</p>

<p style="margin-bottom: 10px;"><strong>Message:</strong> {{ $details['message'] }}</p>

<p style="margin-bottom: 2px;">Thanks & Regards,</p>
<h4 style="margin-top: 0px;">Study in Canada</h4>

