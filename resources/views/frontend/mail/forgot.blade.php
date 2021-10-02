<h1>Hello {{ $user->name }}</h1>

<p>
    Please click the password reset button to reset your password <a href="{{ route('frontend.auth.password.reset.form') }}">Reset Password</a>
</p>