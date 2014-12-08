{{{ $errors->first()}}}
<br>
{{Form::open(array('route' => 'forgotpassword.execute'))}}
    {{Form::label('email', 'Jouw e-mail')}}
    {{Form::text('email') }}

    {{Form::submit('Verzoek nieuwe wachtwoord')}}
{{Form::close()}}