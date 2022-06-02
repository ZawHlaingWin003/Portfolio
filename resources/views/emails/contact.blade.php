@component('mail::message')
# {{ $subject }}

{{ $message }}

From, <br>
# {{ $name }} ({{ $email }})
@endcomponent

{{-- For Customizing This Component
run this => php artisan vendor:publish --tag=laravel-mail
you'll see vendor folder in view :)
--}}
