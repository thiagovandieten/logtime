@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif

<h1>Klantgegevens</h1>

{{Form::open(array('url' => "klantinstellingen/opslaan/$project_id", 'files' => true, 'method' => 'post')) }}
{{Form::text('customer_name', $customer_name, ['placeholder' => 'Klant naam']) }}<br />
{{Form::text('company', $company, ['placeholder' => 'Bedrijfsnaam']) }}<br />

{{Form::text('street', $street, ['placeholder' => 'Straatnaam']) }}<br />
{{Form::text('house_number', $house_number, ['placeholder' => 'Huisnummer']) }}<br />
{{Form::text('zipcode', $zipcode, ['placeholder' => 'Postcode']) }}<br />
{{Form::text('city', $city, ['placeholder' => 'Woonplaats']) }}<br /><br />

<br />

{{Form::submit('Opslaan')}}
{{ Form::close() }}

@stop