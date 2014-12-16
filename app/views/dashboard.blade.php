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

<!-- Get the user name -->
@section('username')
	{{$user}}
@stop

<!-- Return the group projects -->
@section('return_projects')
    @foreach($projects as $project)
        <div>
            <input id="ac-{{$project->id}}" name="accordion-1" type="checkbox" />
            <label for="ac-{{$project->id}}">Voortgang van het project ({{$project->project_name}})
             <div class="rechts-colum">
                                <p class="totaal-uren">321 uren</p>
                                <div class="progress">
                                    <div data-percentage="0%" style="width: 50%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>75%</p>
                            </div>
            </label>
            <article class="ac-small">
            <!--hier begin inhoud van project label--->
             <a href="#"> <div class="leerling-kaart">
                                <img src="images/avatar1.png" alt="avatar">
                               <h2>Thiago van dieten</h2>
                               <div class="stand-leerling">
                                   <div class="progress-leerling">
                                       <div data-percentage="0%" style="width: 74%;" class="progress-bar-leerling progress-bar-success-leerling" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                   </div>
                               </div>
                               <p>74%</p>
                               <div class="leerling-uren">
                                   <h2>324</h2>
                                   <p>uren</p>
                               </div>
                               <div class="leerling-datum">
                                   <h2>12 sep 2014</h2>
                                   <p>Laats geupdate</p>
                               </div>
                           </div></a>

                            <a href="#"><div class="leerling-kaart">
                                <img src="images/avatar1.png" alt="avatar">
                                <h2>Thiago van dieten</h2>
                                <div class="stand-leerling">
                                    <div class="progress-leerling">
                                        <div data-percentage="0%" style="width: 74%;" class="progress-bar-leerling progress-bar-success-leerling" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <p>74%</p>
                                <div class="leerling-uren">
                                    <h2>324</h2>
                                    <p>uren</p>
                                </div>
                                <div class="leerling-datum">
                                    <h2>12 sep 2014</h2>
                                    <p>Laats geupdate</p>
                                </div>
                            </div></a>


                            <a href="#"> <div class="leerling-kaart">
                                <img src="images/avatar1.png" alt="avatar">
                                <h2>Fatih Celik</h2>
                                <div class="stand-leerling">
                                    <div class="progress-leerling">
                                        <div data-percentage="0%" style="width: 50%;" class="progress-bar-leerling progress-bar-success-leerling" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <p>50%</p>
                                <div class="leerling-uren">
                                    <h2>290</h2>
                                    <p>uren</p>
                                </div>
                                <div class="leerling-datum">
                                    <h2>11 sep 2014</h2>
                                    <p>Laats geupdate</p>
                                </div>
                            </div></a>


                            <a href="#">  <div class="leerling-kaart">
                                <img src="images/avatar1.png" alt="avatar">
                                <h2>Dennis Eilander</h2>
                                <div class="stand-leerling">
                                    <div class="progress-leerling">
                                        <div data-percentage="0%" style="width: 45%;" class="progress-bar-leerling progress-bar-success-leerling" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <p>45%</p>
                                <div class="leerling-uren">
                                    <h2>300</h2>
                                    <p>uren</p>
                                </div>
                                <div class="leerling-datum">
                                    <h2>13 sep 2014</h2>
                                    <p>Laats geupdate</p>
                                </div>
                            </div></a>


                            <a href="#"> <div class="leerling-kaart">
                                <img src="images/avatar1.png" alt="avatar">
                                <h2>Yannick Berendsen</h2>
                                <div class="stand-leerling">
                                    <div class="progress-leerling">
                                        <div data-percentage="0%" style="width: 60%;" class="progress-bar-leerling progress-bar-success-leerling" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <p>60%</p>
                                <div class="leerling-uren">
                                    <h2>314</h2>
                                    <p>uren</p>
                                </div>
                                <div class="leerling-datum">
                                    <h2>18 sep 2014</h2>
                                    <p>Laats geupdate</p>
                                </div>
                            </div></a>


                            <a href="#"><div class="leerling-kaart">
                                <img src="images/icons/alert.png" alt="Alert" title="Logboek lang niet bijgewerkt!" class="alert">
                                <img src="images/avatar1.png" alt="avatar">
                                <h2>Phillip Heemskerk</h2>
                                <div class="stand-leerling">
                                    <div class="progress-leerling">
                                        <div data-percentage="0%" style="width: 66%;" class="progress-bar-leerling progress-bar-success-leerling" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <p>66%</p>
                                <div class="leerling-uren">
                                    <h2>320</h2>
                                    <p>uren</p>
                                </div>
                                <div class="leerling-datum">
                                    <h2 style="color: #e84c3d;!important">14 sep 2014</h2>
                                    <p>Laats geupdate</p>
                                </div>
                            </div></a>

                            <div class="klas-stats">
                                <div class="pie-chart">
                                    <div class="pieID pie">

                                    </div>
                                    <ul class="pieID legend">
                                        <li>
                                            <em>Thiago van Dieten</em>
                                            <span>324 </span>
                                        </li>
                                        <li>
                                            <em>Fatih Celik</em>
                                            <span>290 </span>
                                        </li>
                                        <li>
                                            <em>Dennis Eilander</em>
                                            <span>300 </span>
                                        </li>
                                        <li>
                                            <em>Yannick Berendsen</em>
                                            <span>314 </span>
                                        </li>
                                        <li>
                                            <em>Phillip Heemskerk</em>
                                            <span>320 </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="voortgang-leerlingen">
                                    <div id="canvas-holder">
                                        <canvas id="chart-area" width="150" height="150"/></canvas>
                                    </div>
                                    <p><b>75%</b> <br /> voltooid</p>
                                    <div class="progress-project">
                                        <div data-percentage="0%" style="width: 30%;" class="progress-bar-project progress-bar-success-project" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="start-datum">
                                        <b>Start</b><br />
                                        19 sep 2016
                                    </div>
                                    <div class="eind-datum">
                                        <b>Eind</b><br />
                                        24 sep 2017
                                    </div>
                                </div>
                            </div>


            <!---hier eindigt de inhoud--->








            </article>
        </div>
    @endforeach
@stop
<!-- Fast Fill new project -->
@section('fast_fill')
<form method="post">
    <select>
         @foreach($projects as $project)
        	<option>{{$project->project_name}}</option>
   		 @endforeach
    </select>

    <select>
        <option>Onderdeel</option>
        <option>Fase 4</option>
    </select>
    <input type="text" placeholder="00:00"  class="uren">
    <p class="uren-tot">tot</p>
    <input type="text" placeholder="00:00"  class="uren">
    <textarea placeholder="Omschrijving"></textarea>
    <input type="submit" class="bijwerken" value="Bijwerken">
</form>


   
@stop