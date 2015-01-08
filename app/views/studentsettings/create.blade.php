@extends('template.main')
@section('content')
<h1>Nieuwe student aanmaken!</h1>
@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>		
    @endforeach

@endif
@if (isset($message))
	{{var_dump($message)}}
    {{$message}}
@endif
@if (isset($succes))
	{{var_dump($succes)}}
    {{$succes}}
@endif

<p>Avatar</p>

{{Form::open(array('action' => 'StudentSettingController@save_new_user', 'files' => true, 'method' => 'post')) }}
{{Form::file('avatar')}}<br />
{{Form::text('user_code','',  ['placeholder' => 'Leerling code']) }}<br />
{{Form::text('first_name','',  ['placeholder' => 'voornaam']) }}<br />
{{Form::text('last_name','', ['placeholder' => 'achternaam']) }}<br />
{{Form::text('street_name','',  ['placeholder' => 'Straatnaam']) }}<br />
{{Form::text('house_number','',  ['placeholder' => 'Huisnummer']) }}<br />
{{Form::text('zipcode','',  ['placeholder' => 'Postcode']) }}<br />
{{Form::text('city','', ['placeholder' => 'Woonplaats']) }}<br />
{{Form::text('phone_number','',  ['placeholder' => 'telefoonnummer']) }}<br />

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

@stop