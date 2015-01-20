@extends('template.main')
@section('content')
<div class='personal-settings'>
    <h1>Aanpassen</h1>
  {{Form::open(array('route' => array('logboek.update' , $userlog['id']) , 'method' => 'PUT')) }}
      {{Form::select('project' , $userProjects['Projects'] , $userlog['project'])}}
      {{Form::select('categorie' , $userProjects['Categories'] , $userlog['categorie'])}}
      {{Form::select('taak' , $userProjects['Tasks'] , $userlog['task'])}}
      {{Form::text('date' , $userlog['date'] )}}
      {{Form::text('starttijd' , $userlog['start_time'] , null , ['class' => 'uren'])}}
      {{Form::text('stoptijd' , $userlog['stop_time'] , null , ['class' => 'uren'])}}
      {{Form::textarea('omschrijving' , $userlog['description'])}}
    {{Form::submit('Bijwerken',['class' => 'Bijwerken'])}}
  {{Form::close() }}
</div>
@stop