@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif

<h1>Selecteer een project</h1>

<table class="order-table table" cellspacing="0">
    <thead>
    <tr class="border_bottom">
        <td style="color: #666; width: 10%">Project</td>
        <td style="color: #666; width: 10%">Klant</td>
        <td style="color: #666; width: 10%">Bedrijfsnaam</td>
        <td style="color: #666; width: 10%">Project voltooid</td>
    </tr>
    </thead>

    @foreach( $projecten as $index => $project )
        <tr>
            <td><span><a href="/klantinstellingen/wijzig/{{$project->id}}">{{ $project->project_name }}</a></span></td>
            <td>{{ $customers[$index]->customer_name }}</td>
            <td>{{ $customers[$index]->company }}</td>

            <td>@if($project->is_done == '0') 
                {{ $project->is_done = 'Nee' }}
                @else 
                {{ $project->is_done = 'Ja' }} 
                @endif
            </td>
        </tr>  
    @endforeach 

</table>

@stop