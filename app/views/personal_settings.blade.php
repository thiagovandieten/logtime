@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
       <div style="color: red"> {{ $error }}</div>
    @endforeach

@endif

<div class="personal-settings">
<h1>Persoonlijke gegevens</h1>
{{Form::open(array('url' => 'persoonlijke-instellingen/opslaan', 'files' => true, 'method' => 'post')) }}
    <div class="img-omvang">
<img src="/images/{{$personal_data['avatar']}}" width="150" />

{{Form::file('avatar',['class'=>'avatar-veranderen custom-file-input', 'value'=>'Wijzigen'])}}
    </div>
{{Form::text('first_name', $personal_data['first_name'], ['placeholder' => 'voornaam']) }}
{{Form::text('last_name', $personal_data['last_name'], ['placeholder' => 'achternaam']) }}

{{Form::text('street', $personal_data['street'], ['placeholder' => 'Straatnaam']) }}
{{Form::text('house_number', $personal_data['house_number'], ['placeholder' => 'Huisnummer']) }}
{{Form::text('zipcode', $personal_data['zipcode'], ['placeholder' => 'Postcode']) }}
{{Form::text('city', $personal_data['city'] ,['placeholder' => 'Woonplaats']) }}
{{Form::text('phone_number', $personal_data['phone_number'], ['placeholder' => 'telefoonnummer']) }}

<input type="submit" name="save" value="Opslaan">
{{ Form::close() }}


<h1 class="ww-aanpassen">Wachtwoord aanpassen</h1>
{{Form::open(array('url' => 'persoonlijke-instellingen/wachtwoord-wijzigen', 'files' => true, 'method' => 'post')) }}
{{Form::password('old_password',['placeholder' => 'Huidig wachtwoord']) }}
{{Form::password('new_password',['placeholder' => 'Nieuw wachtwoord']) }}
{{Form::password('confirm_password',['placeholder' => 'Wachtwoord herhalen']) }}
<br />
<input type="submit" name="change" value="Wijzigen">
{{ Form::close() }}
</div>
@stop
