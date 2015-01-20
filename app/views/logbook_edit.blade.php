@extends('template.main')
@section('content')
<div class='topbatr'>




{{var_dump($userlog)}};

{{Form::open(array('route' => 'logboek.store', 'method' => 'POST')) }}
              {{Form::select('log categorie' , $userProjects['Log_Categories'])}}
              {{Form::select('project' , $userProjects['Projects'])}}
              {{Form::select('categorie' , $userProjects['Categories'])}}
              {{Form::select('taak' , $userProjects['Tasks'])}}
              {{Form::text('date' , date('Y/m/d') )}}
              {{Form::text('starttijd' , '00:00' , null , ['class' => 'uren'])}}
              {{Form::text('stoptijd' , '00:00' , null , ['class' => 'uren'])}}
              {{Form::textarea('omschrijving' , 'Omschrijving')}}
            {{Form::submit('Bijwerken',['class' => 'Bijwerken'])}}
          {{Form::close() }}
</div>
@stop