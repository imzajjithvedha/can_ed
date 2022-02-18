<p>Hello {{ $details['name'] }},</p>

<p>Thank you very much for contacting <a href="{{ route('frontend.single_business', $details['business_id']) }}" class="text-decoration-none">{{ App\Models\Businesses::where('id', $details['business_id'])->first()->name }}</a> business. That business owner will contact you as soon as possible.</p>

@if($details['email_copy'] == 'on')

    <p>In here, you can find the copy of your contact message details.</p>

    <p><strong>Business:</strong> {{ App\Models\Businesses::where('id', $details['business_id'])->first()->name }}</p>

    <p><strong>Name:</strong> {{ $details['name'] }}</p>

    <p><strong>Email:</strong> {{ $details['email'] }}</p>

    <p style="margin-bottom: 10px;"><strong>Message:</strong> {{ $details['message'] }}</p>

@endif

<p style="margin-bottom: 2px;">Thank you</p>
<h4 style="margin-top: 0px;">Proxima Study Team</h4>

