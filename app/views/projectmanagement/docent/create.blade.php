@extends('template.main')@section('content')    <div class="personal-settings">        <h1>Project aanmaken</h1>    {{ Form::open(array('route' => 'docent.projects.store', 'method' => 'POST')) }}        {{Form::label('project_name', 'Project Naam')}}        {{Form::text('project_name','',['placeholder' => 'Project naam']) }}        <!-- Iets over parent types -->        <!--Selecteer welke leerjaar,        betekent dus dat alle leerjaren van de correcte locatie geladen wordt -->        <!--Een grote checkbox lijst met de klassen? -->        {{Form::label('level_type', 'Methode')}}        <select name="level_type" id="level_type">            <option value="Project">Project</option>            <option value="Werk methode">Werk methode</option>        </select>        {{--{{ Form::select('level_type', array('PICO' => 'PICO',--}}                                            {{--'Taak' => 'Taak',--}}                                            {{--'Scrum' => 'Scrum')) }}--}}        {{Form::label('years', 'Welke leerjaar') }}        <select name="years" id="years">            @foreach($years as $year)                <option value="{{$year->id}}">{{{$year->nickname}}} ({{{$year->year}}})</option>            @endforeach        </select>    {{Form::label('', 'Projectgroepen')}}<br />            @foreach($projectgroepen as $projectgroep)                {{Form::label('project_group', $projectgroep->code)}}                {{Form::checkbox('project_groups[]', $projectgroep->id )}}            @endforeach    {{ Form::close()}}    </div>    <!-- Project tijds periode -->    {{ Form::submit('Voeg project toe!') }}    {{ Form::close()}} @stop