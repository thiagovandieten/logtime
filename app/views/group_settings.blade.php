@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif

<h1>Groepsinstellingen</h1>
<img src="/images/{{$group_image}}"  width="150"/> <br />
{{Form::open(array('url' => 'groepsinstellingen/opslaan', 'files' => true, 'method' => 'post')) }}
{{Form::file('group_image')}}<br /><br />
{{Form::text('group_name', $group_name, ['placeholder' => 'groepsnaam']) }}<br />

{{Form::text('street', $street, ['placeholder' => 'Straatnaam']) }}<br />
{{Form::text('house_number', $house_number, ['placeholder' => 'Huisnummer']) }}<br />
{{Form::text('zipcode', $zipcode, ['placeholder' => 'Postcode']) }}<br />
{{Form::text('city', $city, ['placeholder' => 'Woonplaats']) }}<br /><br />

{{Form::text('group_wage', $group_wage, ['placeholder' => 'uurloon']) }}<br />

<br />

{{Form::submit('Opslaan')}}
{{ Form::close() }}

@stop