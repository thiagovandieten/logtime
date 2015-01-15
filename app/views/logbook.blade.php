@extends('template.main')
@section('content')
<div class='topbar'>

	{{Form::open(array('route' => 'logboek.create', 'method' => 'GET')) }}
	    <h2>Uren bijwerken</h2>
	               {{Form::select('project', ['1'=> 'Kies een project'])}}
	               <select>
	                   <option>Kies een project</option>
	                   <option>Logtime</option>
	                   <option>Pizza today</option>
	                   <option>Malcom</option>
	               </select>
	               {{Form::select('categorie', ['1'=> 'Fase 4'])}}
	               <select>
	                   <option>Onderdeel</option>
	                   <option>Fase 4</option>
	               </select>
	               {{Form::select("taak", ['1'=> 'Logtime'])}}
	               {{Form::date()}}
	               <input type="date" placeholder="Datum" name="date" class="datepicker">
	               <input type="text" placeholder="00:00"  class="uren">
	               <p class="uren-tot">tot</p>
	               <input type="text" placeholder="00:00"  class="uren">
	               <textarea placeholder="Omschrijving"></textarea>
	{{Form::submit('Bijwerken',['class' => 'Bijwerken'])}}
	{{Form::close() }}
</div>
@stop