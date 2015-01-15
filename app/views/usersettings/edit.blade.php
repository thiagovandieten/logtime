@extends('template.main')
@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif

<div class="personal-settings">
<h1>Gegevens van {{$personal_data['first_name']}} {{$personal_data['last_name']}} </h1>
{{Form::open(array('url' => 'usersettings/save', 'files' => true, 'method' => 'post')) }}
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
{{ Form::close() }}


<h1  class="ww-aanpassen">Wachtwoord aanpassen</h1>
{{ Form::open() }}
{{Form::text('first-password','',['placeholder' => 'Wachtwoord']) }} <br />
{{Form::text('second_password','',['placeholder' => 'Wachtwoord herhalen']) }}

{{Form::submit('Wijzigen')}}
{{ Form::close() }}
</div>


@stop