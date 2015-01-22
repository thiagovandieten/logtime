@extends('template.main') 

<!-- Application name --> 
@section('application_name')
	Logtime
@stop 

<!-- Application Version --> 
@section('application_version')
	Version 0.9
@stop 
<!-- Count the notifications --> 
@section('notiamount')
    9	
@stop 

<!-- Get the notifications --> 
@section('get_notifications')
	Hier komen de notificaties
@stop 

<!-- Return the group viewDatas --> 
@section('content')

	@if(isset($msg))
    	{{$msg}}
    @endif
     
    
    @foreach($projectData as $data => $key)
    {{ print_r($key)}}
<section class="ac-container">
  <div>
            <input id="ac-" name="accordion-1" type="checkbox" />
            <label for="ac-">Voortgang van het ({{$key[$key['id']]['project_name']}})
             <div class="rechts-colum">
                                <p class="totaal-uren">321 uren</p>
                                <div class="progress">
                                    <div data-percentage="0%" style="width: 50%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>75%</p>
                            </div>
            </label>
            <article class="ac-small">{{ print_r($studentData)}} 
            
            
            
            {{ $studentData[$key['id']][$key['id']['group_id']]['1']['latest_update']}}
            @foreach($studentData as $daata => $keey)
            
            <div class="leerling-kaart"> <img src="images/avatar1.png" alt="avatar">
                  <h2></h2>
                  
                  <div class="leerling-uren">
                    <h2></h2>
                    <p>Tijd</p>
                  </div>
                  <div class="leerling-datum">
                    <h2></h2>
                  </div>
                </div>
            @endforeach
  
            </article>
        </div>
 </section>
@endforeach
@stop