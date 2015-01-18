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
</div>
@stop