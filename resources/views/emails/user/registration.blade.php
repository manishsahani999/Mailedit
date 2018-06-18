@component('mail::message')

@component('mail::panel')

Hi {{ $user->first_name }},

Thank you for registering with Mailedit <br>
We are grateful to have you on board.
<br><br>


@component('mail::button', ['url' => '#'])
Login to Dashboard
@endcomponent


Thanks,<br>
Mailedit Team
@endcomponent

@endcomponent

