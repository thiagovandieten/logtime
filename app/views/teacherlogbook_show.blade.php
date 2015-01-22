@extends('template.main')
@section('content')
	<div class='topbatr'>
		<table>
		<tr>
			<td>
				Gebruiker
			</td>
			<td>
				Date
			</td>
			<td>
				Project
			</td>
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
	    		<td>{{$userlog['user']}}</td>
	    		<td>{{$userlog['date']}}</td>
	    		<td>{{$userlog['project']}}</td>
	    		<td>{{$userlog['categorie']}}</td>
	    		<td>{{$userlog['task']}}</td>
	    		<td>{{$userlog['start_time']}}</td>
	    		<td>{{$userlog['stop_time']}}</td>
	    		<td>{{$userlog['total_time_in_hours']}}</td>
	    		<td>{{$userlog['description']}}</td>
	    	</tr>
	    @endforeach
	</table>
	</div>
@stop