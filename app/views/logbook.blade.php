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
			<td>
				Edit
			</td>
			<td>
				Delete
			</td>
		</tr>
	    @foreach($userlogs as $userlog)
	    	<tr>
	    		<td>{{{$userlog['log_categorie']}}}</td>
	    		<td>{{{$userlog['task']}}}</td>
	    		<td>{{{$userlog['start_time']}}}</td>
	    		<td>{{{$userlog['stop_time']}}}</td>
	    		<td>{{{$userlog['total_time_in_hours']}}}</td>
	    		<td>{{{$userlog['description']}}}</td>
				{{{Form::open(array('route' => array('logboek.edit' , $userlog['id']),'method' => 'GET')) }}}
	    			<td>{{{Form::submit('Edit')}}}</td>
	    		{{{Form::close() }}}
	    		{{{Form::open(array('route' => array('logboek.destroy' , $userlog['id']),'method' => 'DELETE')) }}}
	    			<td>{{{Form::submit('Delete')}}}</td>
	    		{{{Form::close() }}}
	    	</tr>
	    @endforeach
	</table>
</div>
@stop