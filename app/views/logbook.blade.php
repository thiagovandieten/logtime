@extends('template.main')
@section('content')
<div class='topbar'>

{{Form::open(array('route' => 'logboek.create', 'method' => 'GET')) }}
{{Form::submit('Opslaan')}}
{{Form::close() }}
</div>
@stop