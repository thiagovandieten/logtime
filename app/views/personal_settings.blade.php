@extends('template.main')

@section('content')

<h1>Persoonlijke gegevens</h1>
{{ Form::open() }}
{{Form::text('first_name','',['placeholder' => 'Voornaam']) }}
{{Form::text('last_name','',['placeholder' => 'Achternaam']) }}

{{Form::text('street_name','',['placeholder' => 'Straatnaam']) }}
{{Form::text('house_number','',['placeholder' => 'Huisnummer']) }}
{{Form::text('zipcode','',['placeholder' => 'Postcode']) }}
{{Form::text('city','',['placeholder' => 'Woonplaats']) }}
{{Form::text('phone','',['placeholder' => 'Telefoonnummer']) }}

{{Form::submit('Opslaan')}}
{{ Form::close() }}

<h1>Wachtwoord aanpassen</h1>
{{ Form::open() }}
{{Form::text('first-password','',['placeholder' => 'Wachtwoord']) }}
{{Form::text('second_password','',['placeholder' => 'Wachtwoord herhalen']) }}

{{Form::submit('Wijzigen')}}
{{ Form::close() }}

@stop