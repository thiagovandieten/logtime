@extends('template.main')
@section('content')

@if ($errors->has())	
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach
@endif

<div class="personal-settings">
<h1>Gegevens van {{$personal_data['first_name']}} {{$personal_data['last_name']}} </h1>
{{Form::open(array('url' => 'docent/usersettings/save', 'files' => true, 'method' => 'post')) }}
<img src="/images/{{$personal_data['avatar']}}" width="150" />
    <div class="img-omvang">
{{Form::file('avatar', ['class'=>'avatar-veranderen custom-file-input', 'value'=>'Wijzigen'])}}
        </div>
{{Form::text('first_name', $personal_data['first_name'], ['placeholder' => 'voornaam']) }}
{{Form::text('last_name', $personal_data['last_name'], ['placeholder' => 'achternaam']) }}

{{Form::text('street', $personal_data['street'], ['placeholder' => 'Straatnaam']) }}
{{Form::text('house_number', $personal_data['house_number'], ['placeholder' => 'Huisnummer']) }}
{{Form::text('zipcode', $personal_data['zipcode'], ['placeholder' => 'Postcode']) }}
{{Form::text('city', $personal_data['city'] ,['placeholder' => 'Woonplaats']) }}
{{Form::text('phone_number', $personal_data['phone_number'], ['placeholder' => 'telefoonnummer']) }}
{{Form::hidden('invisible', $personal_data['id'], array('id' => 'invisible_id')) }}

{{Form::submit('Opslaan')}}

<br/>
@if ($personal_data['active'] == 0)	
    
    	<input type='submit' name='set_active' value='Activeer Gebruiker'>
  
@else

    	<input type='submit' name='set_inactive' value='Deactiveer Gebruiker'>

@endif
{{ Form::close() }}


<h1  class="ww-aanpassen">Wachtwoord aanpassen</h1>
{{Form::open(array('url' => 'docent/usersettings/wachtwoord-wijzigen', 'files' => false, 'method' => 'post')) }}
{{Form::password('old_password',['placeholder' => 'Huidig wachtwoord']) }}
{{Form::password('new_password',['placeholder' => 'Nieuw wachtwoord']) }}
{{Form::password('confirm_password',['placeholder' => 'Wachtwoord herhalen']) }}
{{Form::hidden('invisible', $personal_data['id'], array('id' => 'invisible_id')) }}
<br />
<input type="submit" name="change" value="Wijzigen">
{{ Form::close() }}
</div>


@stop