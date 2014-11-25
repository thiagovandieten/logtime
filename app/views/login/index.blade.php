{{Form::open(array('route' => 'login.authentication'))}}
    {{Form::label('user_code', 'Login code:')}}
    {{Form::text('user_code') }}

    {{Form::label('password', 'Wachtwoord')}}
    {{Form::password('password')}}

    {{Form::submit()}}
{{Form::close()}}