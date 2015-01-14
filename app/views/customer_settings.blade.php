@extends('template.main')

@section('content')

@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        {{ $error }}		
    @endforeach

@endif

<h1>Projecten</h1>

<table class="order-table table" cellspacing="0">
            <thead>
            <tr class="border_bottom">
                <td style="color: #666; width: 10%">Project</td>
                <td style="color: #666; width: 10%">Klant</td>
            </tr>
            </thead>
            
    
           

            @foreach ($projecten as $project)
                <tr>
                    <td><span><a href="/klantinstellingen/wijzig/{{$project->id}}">{{ $project->project_name }}</a></span></td>
                     
                </tr>
            @endforeach
    
            @foreach ($customers as $customer)
                
                    <td>{{ $customer->customer_name }}</td>
                
            @endforeach
    
           
        </table>

@stop