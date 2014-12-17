@extends('template.main')
@section('content')
<div class='topbar'>
{{Form::open(array('route' => 'logbook.create', 'method' => 'put'))}}
{{Form::select('sort_year', array('2014', '2015'));}}
{{Form::select('sort_period', array('2014', '2015'));}}
{{Form::select('sort_category', array('2014', '2015'));}}
{{Form::select('sort_task', array('2014', '2015'));}}
{{Form::select('sort_date', array('2014', '2015'));}}
{{Form::submit('Bijwerken!');}}
</div>
@stop