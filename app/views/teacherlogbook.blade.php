@extends('template.main')
@section('content')
	<div class='topbatr'>
		<table>
			@foreach($coachgroups as $coachgroup)
				<tr>
					<td>
						{{$coachgroup['name']}}
					</td>
					<td>
						{{$coachgroup['code']}}
					</td>
					<td>
						@foreach($coachgroup['projects'] as $project)
							{{$project['name']}}: {{$project['time_spent']}}<br>
						@endforeach
					</td>

					{{Form::open(array('route' => array('docent.teacherlogbook.show' , $coachgroup['id']),'method' => 'GET')) }}
	    				<td>
	    					{{Form::submit('Show')}}
	    				</td>
	    			{{Form::close() }}
				</tr>
			@endforeach
		</table>
	</div>
@stop