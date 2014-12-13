@extends('template.main')

@section('return_projects')
    @foreach($projects as $project)
        <div>
            <input id="ac-{{$project->id}}" name="accordion" type="checkbox" />
            <label for="ac-{{$project->id}}">Voortgang van het project ({{$project->project_name}})</label>
            <article class="ac-small"> Content</article>
        </div>
    @endforeach
@stop