@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif

<h1>Groepsinstellingen</h1>

<img src="/images/{{$group_image}}" width="150"/> <br />
{{Form::open(array('url' => 'groepsinstellingen/opslaan', 'files' => true, 'method' => 'post')) }}
{{Form::file('group_image')}}<br />
{{Form::text('group_name', $group_name, ['placeholder' => 'groepsnaam']) }}<br />
{{Form::text('group_wage', $group_wage, ['placeholder' => 'uurloon']) }}<br />

<br />

{{Form::submit('Opslaan')}}
{{ Form::close() }}

@stop