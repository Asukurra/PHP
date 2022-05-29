@component('mail::message')
# Welcome to my WebApp

This is a small projcet to get to grips with the use of Laravel - <br> Thanks for checking it out!



@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Click here for Homepage
@endcomponent

Regards <br>
Anthony
<!-- {{ config('app.name') }} -->
@endcomponent
