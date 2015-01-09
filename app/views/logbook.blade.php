@extends('template.main')
@section('content')
<div class='topbar'>

{{Form::open(array('url' => 'logbook/opslaan', 'files' => false, 'method' => 'post')) }}
{{Form::select('task', array('Logtime', 'Pizzatoday'));}}
{{Form::input('description', 'text');}}
{{Form::text('start_time','',['placeholder' => 'Begin tijd']) }}
{{Form::text('end_time','',['placeholder' => 'Eind tijd']) }}
{{Form::submit('Opslaan')}}
{{Form::close() }}
</div>
@stop