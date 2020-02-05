@component('mail::message')

@component('mail::panel')

Hi {{ $user->name }},

Thank you for registering with Mailedit <br>
We are grateful to have you on board.
<br><br>


@component('mail::button', ['url' => 'https://email.grorapid.com/dashboard'])
Login to Dashboard
@endcomponent


Thanks,<br>
Grorapid Team
@endcomponent

@endcomponent

