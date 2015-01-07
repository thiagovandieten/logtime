@extends('template.main')
@section('content')
@if ($errors->has())
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach
@endif

	<button>{{HTML::link('studentsettings/create', 'Nieuw')}}</button>
<br/>    
<br/>    
    {{Form::open(array('url' => 'studentsettings/delete', 'files' => false, 'method' => 'post')) }} 
    {{Form::submit('Verwijderen')}}
    {{Form::close()}}

	Filter op: 
    <select name='leerjaar'>
    	<option>Leerjaar</option>
        <option value='1'>21014</option>
    </select>
    <select name='periode'>
    	<option>Periode</option>
        <option value='1'>1</option>
    </select>
    <select name='klas'>
    	<option>Klas</option>
        <option value='1'>4D0W</option>
    </select>
    <select name='student'>
    	<option>Student</option>
        <option value='1'>Maria</option>
    </select>
<br/><br/>
@foreach($all_students as $data)
    <div>{{$data->first_name}} {{$data->last_name}} -
   	
    {{Form::open(array('url' => 'studentsettings/edit', 'method' => 'post')) }} 
   	{{Form::hidden('invisible', $data->id, array('id' => 'invisible_id')) }}
    {{Form::submit('Bewerken')}}
    {{Form::close() }}
    
    </div>
@endforeach
@stop