<p>Hello, {{ $details['name'] }}</p>

<p style="margin-bottom: 2px;">Please click the password reset button to reset your password <a href="{{ route('frontend.auth.password.reset', $details['email'] ) }}">Reset Password</a></p>

<p style="margin-bottom: 2px;">Thanks & Regards,</p>
<h4 style="margin-top: 0px;">Study in Canada</h4>