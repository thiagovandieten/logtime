@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif

<h1>Groepsafbeelding</h1>
{{Form::open(array('url' => 'persoonlijke-instellingen/opslaan', 'files' => true, 'method' => 'post')) }}
{{Form::file('avatar')}}<br />
{{Form::text('first_name', $group_data['first_name'], ['placeholder' => 'voornaam']) }}<br />
{{Form::text('last_name', $group_data['last_name'], ['placeholder' => 'achternaam']) }}<br />
<br />

{{Form::submit('Opslaan')}}
{{ Form::close() }}

@stop