@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif
<div class="personal-settings">
<h1>Groepsinstellingen</h1>
<img src="/images/{{$group_image}}"  width="150"/> <br />
{{Form::open(array('url' => 'groepsinstellingen/opslaan', 'files' => true, 'method' => 'post')) }}
    <div class="img-omvang">
{{Form::file('group_image', ['class'=>'avatar-veranderen custom-file-input', 'value'=>'Wijzigen'])}}
        </div>
{{Form::text('group_name', $group_name, ['placeholder' => 'groepsnaam']) }}

{{Form::text('street', $street, ['placeholder' => 'Straatnaam']) }}
{{Form::text('house_number', $house_number, ['placeholder' => 'Huisnummer']) }}
{{Form::text('zipcode', $zipcode, ['placeholder' => 'Postcode']) }}
{{Form::text('city', $city, ['placeholder' => 'Woonplaats']) }}

{{Form::text('group_wage', $group_wage, ['placeholder' => 'uurloon']) }}



{{Form::submit('Opslaan')}}
{{ Form::close() }}
</div>
@stop