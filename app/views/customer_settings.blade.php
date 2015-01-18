@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<div class="projecten-overzicht">
    <div class="personal-settings">
<h1>Selecteer een project</h1>
    </div>

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
            <td><a href="/klantinstellingen/wijzig/{{$project->id}}">{{ $project->project_name }}</a></td>
            <td><a href="/klantinstellingen/wijzig/{{$project->id}}">{{ $customers[$index]->customer_name }}</a></td>
            <td><a href="/klantinstellingen/wijzig/{{$project->id}}">{{ $customers[$index]->company }}</a></td>

            <td><a href="/klantinstellingen/wijzig/{{$project->id}}">@if($project->is_done == '0')
                {{ $project->is_done = 'Nee' }}
                @else 
                {{ $project->is_done = 'Ja' }} 
                @endif
                </a> </td>
         </tr>
    @endforeach 

</table>
    <script>
        $(document).ready(function()
        {
            $("table tr:odd").css("background-color", "#ededed");
        });
    </script>
</div>
@stop