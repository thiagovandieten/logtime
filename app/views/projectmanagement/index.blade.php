@extends('template.main')

@section('content')
<table>
	<tr>
		<td>Projectnaam</td>
		<td>Laatst geupdate</td>
	</tr>
	@foreach ($projects as $project) 
		<tr>
			<td>{{$project->project_name}}</td>
			<td>{{$project->updated_at}}</td>
		</tr>
	@endforeach
	<tr>
		<td>Kasboekje</td>
		<td>1-1-2001</td>
	</tr>
</table>

@stop

