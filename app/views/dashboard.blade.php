@extends('template.main')

<!-- Application name -->
@section('application_name')
	Logtime
@stop

<!-- Application Version -->
@section('application_version')
	Version 0.9
@stop
<!-- Count the notifications -->
@section('notiamount')
    9	
@stop

<!-- Get the notifications -->
@section('get_notifications')
	Hier komen de notificaties
@stop

<!-- Get the user name -->
@section('username')
	{{$user}}
@stop

<!-- Return the group projects -->
@section('return_projects')
    @foreach($projects as $project)
        <div>
            <input id="ac-{{$project->id}}" name="accordion" type="checkbox" />
            <label for="ac-{{$project->id}}">Voortgang van het project ({{$project->project_name}})</label>
            <article class="ac-small"> Content</article>
        </div>
    @endforeach
@stop
<!-- Fast Fill new project -->
@section('fast_fill')
<form method="post">
    <select>
         @foreach($projects as $project)
        	<option>{{$project->project_name}}</option>
   		 @endforeach
    </select>

    <select>
        <option>Onderdeel</option>
        <option>Fase 4</option>
    </select>
    <input type="text" placeholder="00:00"  class="uren">
    <p class="uren-tot">tot</p>
    <input type="text" placeholder="00:00"  class="uren">
    <textarea placeholder="Omschrijving"></textarea>
    <input type="submit" class="bijwerken" value="Bijwerken">
</form>


   
@stop