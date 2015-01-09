@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif

<h1>Persoonlijke gegevens</h1>
{{Form::open(array('url' => 'persoonlijke-instellingen/opslaan', 'files' => true, 'method' => 'post')) }}
<img scr="C:/xampp/htdocs/logtime/public/images/{{$personal_data['avatar']}}" /> 
{{Form::file('avatar')}}<br />
{{Form::text('first_name', $personal_data['first_name'], ['placeholder' => 'voornaam']) }}<br />
{{Form::text('last_name', $personal_data['last_name'], ['placeholder' => 'achternaam']) }}<br />

{{Form::text('street_name','',['placeholder' => 'Straatnaam']) }}<br />
{{Form::text('house_number', '', ['placeholder' => 'Huisnummer']) }}<br />
{{Form::text('zipcode','',['placeholder' => 'Postcode']) }}<br />
{{Form::text('city','',['placeholder' => 'Woonplaats']) }}<br />
{{Form::text('phone_number', $personal_data['phone_number'], ['placeholder' => 'telefoonnummer']) }}<br />

{{Form::submit('Opslaan')}}
{{ Form::close() }}

<br />
<h1>Wachtwoord aanpassen</h1>
{{ Form::open() }}
{{Form::text('first-password','',['placeholder' => 'Wachtwoord']) }} <br />
{{Form::text('second_password','',['placeholder' => 'Wachtwoord herhalen']) }}
<br />
{{Form::submit('Wijzigen')}}
{{ Form::close() }}

@stop