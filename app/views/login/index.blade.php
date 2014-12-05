{{{$errors->first()}}}
<br>

{{Form::model(array('route' => 'login.authentication'))}}
    {{Form::label('login', 'Login code:')}}
    {{Form::text('login') }}

    {{Form::label('password', 'Wachtwoord')}}
    {{Form::password('password')}}

    {{Form::submit()}}
{{Form::close()}}