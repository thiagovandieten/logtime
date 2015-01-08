@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif

<h1>Klantgegevens</h1>

<img src="/images/" width="150"/> <br />
{{Form::open(array('url' => 'groepsinstellingen/opslaan', 'files' => true, 'method' => 'post')) }}
{{Form::file('group_image')}}<br /><br />
{{Form::text('group_name', '', ['placeholder' => 'Bedrijfsnaam']) }}<br />

{{Form::text('street', '', ['placeholder' => 'Straatnaam']) }}<br />
{{Form::text('house_number', '', ['placeholder' => 'Huisnummer']) }}<br />
{{Form::text('zipcode', '', ['placeholder' => 'Postcode']) }}<br />
{{Form::text('city', '', ['placeholder' => 'Woonplaats']) }}<br /><br />

<br />

{{Form::submit('Opslaan')}}
{{ Form::close() }}

@stop