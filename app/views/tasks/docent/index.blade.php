@extends('template.main')

@section('content')
    @foreach($tasks as $task)
        <p>Dit zijn alle $task gegevens</p>

        {{Input::html()}}

        {{$task->id . '<br>' . $task->task_name . '<br>' . $task->project_id . '<br>' . $task->categorie_id }}
    @endforeach
@stop