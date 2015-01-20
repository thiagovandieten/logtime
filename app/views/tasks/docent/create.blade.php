@extends('template.main')

@section('content')

    {{Form::open()}}
        {{ Form::label('task_name', 'Taaknaam') }}
        {{ Form::text('task_name') }}

        {{ Form::label('project_naam') }}

    {{Form::close()}}
    <p>Naam van het project</p>
    <p>Welke catogerie? (Fases ofzo, moet ook een eigen catogerie kunnen aanmaken)</p>
    <p></p>
@stop