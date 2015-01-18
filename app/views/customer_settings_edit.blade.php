@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif
<div class="personal-settings">
<h1 style="padding-bottom: 10px;">Klantgegevens</h1>

{{Form::open(array('url' => "klantinstellingen/opslaan/$project_id", 'files' => true, 'method' => 'post')) }}
{{Form::text('customer_name', $customer_name, ['placeholder' => 'Klant naam']) }}
{{Form::text('company', $company, ['placeholder' => 'Bedrijfsnaam']) }}

{{Form::text('street', $street, ['placeholder' => 'Straatnaam']) }}
{{Form::text('house_number', $house_number, ['placeholder' => 'Huisnummer']) }}
{{Form::text('zipcode', $zipcode, ['placeholder' => 'Postcode']) }}
{{Form::text('city', $city, ['placeholder' => 'Woonplaats']) }}



{{Form::submit('Opslaan')}}
{{ Form::close() }}
</div>
@stop