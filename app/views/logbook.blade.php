@extends('template.main')
@section('content')
<div class='topbatr'>
	<table>
		<tr>
			<td>
				Categorie
			</td>
			<td>
				Taak
			</td>
			<td>
				Begintijd
			</td>
			<td>
				Eindtijd
			</td>
			<td>
				Totaal uren
			</td>
			<td>
				Omschrijving
			</td>
		</tr>
	    @foreach($userlogs as $userlog)
	    	<tr>
	    		<td>{{$userlog['log_categorie'] }}</td>
	    		<td>{{$userlog['task']}}</td>
	    		<td>{{$userlog['start_time']}}</td>
	    		<td>{{$userlog['stop_time']}}</td>
	    		<td>{{$userlog['total_time_in_hours']}}</td>
	    		<td>{{$userlog['description']}}</td>
	    	</tr>
	    @endforeach
	</table>
	{{Form::open(array('route' => 'logboek.create', 'method' => 'GET')) }}
	    <h2>Uren bijwerken</h2>
	    {{Form::select('log categorie' , $userProjects['Log_Categories'])}}
	    {{Form::select('project' , $userProjects['Projects'])}}
       	{{Form::select('categorie' , $userProjects['Categories'])}}
       	{{Form::select('taak' , $userProjects['Tasks'])}}
       	{{Form::input('date' , 'date' , null , ['class' => 'datepicker' , 'placeholder' => 'Datum' ])}}
        {{Form::text('starttijd' , '00:00' , null , ['class' => 'uren'])}}
        {{Form::text('stoptijd' , '00:00' , null , ['class' => 'uren'])}}
        {{Form::textarea('omschrijving' , 'Omschrijving')}}
		{{Form::submit('Bijwerken',['class' => 'Bijwerken'])}}
	{{Form::close() }}
</div>
@stop