@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif

<h1>Projecten</h1>

 @foreach ($projecten as $project)
    <a href="/klantinstellingen/wijzig/{{$project->id}}">{{ $project->project_name }}</a><br />
 @endforeach

@stop