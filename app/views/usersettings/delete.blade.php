@extends('template.main')
@section('content')
<h1>Gebruiker verwijderen</h1>
<em>Let op! Waneneer je een gebruiker verwijderd is hij voorgoed uit het systeem verwijderd!</em>
<br/>
<br/>
{{ Form::open(array('action' => 'UserSettingsController@hard_delete', 'method' => 'post')) }} 	
{{ Form::hidden('user', $_GET['user'], array('id' => 'invisible_id')) }}
{{ Form::submit('Verwijder de gebruiker!')}}
{{ Form::close() }}
@stop