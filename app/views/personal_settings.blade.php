@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif


<h1>Persoonlijke gegevens</h1>
{{Form::open(array('url' => 'persoonlijke-instellingen/opslaan', 'files' => true, 'method' => 'post')) }}
<img src="/images/{{$personal_data['avatar']}}" width="150" /> <br />
{{Form::file('avatar')}}<br />
{{Form::text('first_name', $personal_data['first_name'], ['placeholder' => 'voornaam']) }}<br />
{{Form::text('last_name', $personal_data['last_name'], ['placeholder' => 'achternaam']) }}<br />

{{Form::text('street', $personal_data['street'], ['placeholder' => 'Straatnaam']) }}<br />
{{Form::text('house_number', $personal_data['house_number'], ['placeholder' => 'Huisnummer']) }}<br />
{{Form::text('zipcode', $personal_data['zipcode'], ['placeholder' => 'Postcode']) }}<br />
{{Form::text('city', $personal_data['city'] ,['placeholder' => 'Woonplaats']) }}<br />
{{Form::text('phone_number', $personal_data['phone_number'], ['placeholder' => 'telefoonnummer']) }}<br />

<input type="submit" name="save" value="Opslaan">
{{ Form::close() }}

<br />
<h1>Wachtwoord aanpassen</h1>
{{Form::open(array('url' => 'persoonlijke-instellingen/wachtwoord-wijzigen', 'files' => true, 'method' => 'post')) }}
{{Form::password('old_password',['placeholder' => 'Huidig wachtwoord']) }} <br />
{{Form::password('new_password',['placeholder' => 'Nieuw wachtwoord']) }} <br />
{{Form::password('confirm_password',['placeholder' => 'Wachtwoord herhalen']) }}
<br />
<input type="submit" name="change" value="Wijzigen">
{{ Form::close() }}

@stop