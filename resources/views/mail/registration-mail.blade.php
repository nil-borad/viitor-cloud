@component('mail::message')
# Welcome 

Please Active Your Profile

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
