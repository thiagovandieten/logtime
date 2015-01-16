@extends('template.main')
@section('content')
    <div class="personal-settings">
<h1>Nieuwe student aanmaken!</h1>
@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>		
    @endforeach

@endif
{{(string) Session::get('msg')}}

{{Form::open(array('action' => 'UserSettingsController@save_new_user', 'files' => true, 'method' => 'post')) }}
{{Form::text('user_code','',  ['placeholder' => 'Leerling code']) }}
{{Form::text('first_name','',  ['placeholder' => 'voornaam']) }}
{{Form::text('last_name','', ['placeholder' => 'achternaam']) }}
{{Form::text('street_name','',  ['placeholder' => 'Straatnaam']) }}
{{Form::text('house_number','',  ['placeholder' => 'Huisnummer']) }}
{{Form::text('zipcode','',  ['placeholder' => 'Postcode']) }}
{{Form::text('city','', ['placeholder' => 'Woonplaats']) }}
{{Form::text('phone_number','',  ['placeholder' => 'telefoonnummer']) }}

<select name='location'> 
@foreach ($locations as $location_data)
	<option value='{{ $location_data->id }}'> {{ $location_data->location }}</option>		
@endforeach
</select>
<select name='user_type'> 
@foreach ($user_types as $user_types_data)
	<option value='{{ $user_types_data->id }}'> {{ $user_types_data->user_type }}</option>		
@endforeach
</select>




<br />
{{Form::submit('Opslaan')}}
{{ Form::close() }}
    </div>
@stop