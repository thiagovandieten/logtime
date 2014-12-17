@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif

<h1>Persoonlijke gegevens</h1>
{{Form::open(array('url' => 'persoonlijke-instellingen/opslaan', 'files' => true, 'method' => 'post')) }}
{{Form::file('avatar')}}
{{Form::text('first_name', $personal_data['first_name'], ['placeholder' => 'voornaam']) }}
{{Form::text('last_name', $personal_data['last_name'], ['placeholder' => 'achternaam']) }}

{{Form::text('street_name','',['placeholder' => 'Straatnaam']) }}
{{Form::text('house_number', '', ['placeholder' => 'Huisnummer']) }}
{{Form::text('zipcode','',['placeholder' => 'Postcode']) }}
{{Form::text('city','',['placeholder' => 'Woonplaats']) }}
{{Form::text('phone_number', $personal_data['phone_number'], ['placeholder' => 'telefoonnummer']) }}

{{Form::submit('Opslaan')}}
{{ Form::close() }}

<br />
<h1>Wachtwoord aanpassen</h1>
{{ Form::open() }}
{{Form::text('first-password','',['placeholder' => 'Wachtwoord']) }} <br />
{{Form::text('second_password','',['placeholder' => 'Wachtwoord herhalen']) }}

{{Form::submit('Wijzigen')}}
{{ Form::close() }}

@stop