@extends('template.main')
@section('content')
<h1>Student verwijderen</h1>
<p>Je kunt hier kiezen voor een <strong>soft delete</strong> of een <strong>hard delete</strong>!<br/>
- Een <strong>soft delete</strong> zet de student/docent op inactief.<br/>
- Een <strong>hard delete</strong> verwijderd de student/docent uit het gehele systeem.
</p>


{{ Form::open(array('action' => 'UserSettingsController@hard_delete', 'method' => 'post')) }} 	
{{ Form::hidden('user', $_GET['user'], array('id' => 'invisible_id')) }}
{{ Form::submit('Hard Delete')}}
{{ Form::close() }}
@stop