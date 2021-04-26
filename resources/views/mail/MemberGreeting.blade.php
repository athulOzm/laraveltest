@component('mail::message')

Hai, {{$member->name}}

Registerd with {{$member->email}}, thankyou!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
