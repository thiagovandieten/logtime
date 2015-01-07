@extends('template.main')
@section('content')
<h1>Nieuwe student aanmaken!</h1>
<p>Avatar</p>

{{Form::open(array('url' => 'persoonlijke-instellingen/opslaan', 'files' => true, 'method' => 'post')) }}
{{Form::file('avatar')}}<br />
{{Form::text('first_name','',  ['placeholder' => 'voornaam']) }}<br />
{{Form::text('last_name','', ['placeholder' => 'achternaam']) }}<br />

{{Form::text('street_name','',  ['placeholder' => 'Straatnaam']) }}<br />
{{Form::text('house_number','',  ['placeholder' => 'Huisnummer']) }}<br />
{{Form::text('zipcode','',  ['placeholder' => 'Postcode']) }}<br />
{{Form::text('city','', ['placeholder' => 'Woonplaats']) }}<br />
{{Form::text('phone_number','',  ['placeholder' => 'telefoonnummer']) }}<br />
{{Form::text('first-password','',['placeholder' => 'Wachtwoord']) }} <br />
{{Form::text('second_password','',['placeholder' => 'Wachtwoord herhalen']) }}
<br />
{{Form::submit('Opslaan')}}
{{ Form::close() }}

@stop