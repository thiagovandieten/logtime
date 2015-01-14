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
        <td style="color: #666; width: 10%">Bewerken</td>
    </tr>
    </thead>

    @foreach( $projecten as $index => $project )
       <tr>
            <td>{{ $project->project_name }}</td>
            <td>{{ $customers[$index]->customer_name }}</td>
            <td>{{ $customers[$index]->company }}</td>

            <td>
                @if($project->is_done == '0')
                {{ $project->is_done = 'Nee' }}
                @else 
                {{ $project->is_done = 'Ja' }} 
                @endif
            </td>
           <td><a href="/klantinstellingen/wijzig/{{$project->id}}"><button class="studenten-bewerken">Bewerken</button</a></td>
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