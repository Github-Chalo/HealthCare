@component('mail::message')
# Arduino Offline Alert

Hello {{ $user->name }},

We noticed that your Arduino device (ID: **{{ $user->adreno_no }}**) has not sent any data for over 5 hours.

This may indicate that your device is:

- Disconnected from the network  
- Powered off  
- Experiencing an error  

@component('mail::panel')
Please check your device as soon as possible to restore connection.
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
