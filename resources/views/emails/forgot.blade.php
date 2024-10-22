@component('mail::message')
Hello {{ $user->name }},

@component('mail::button', ['url'=>url('reset/'.$user->remember_token)])
Reset Password
@endcomponent


<p>Any problems recoring your password, contact US</p>

Thansk <br>
{{ config('app.name') }}

@endcomponent
