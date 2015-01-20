<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <title>LogTime | Welcome</title>
    {{HTML::style(asset('css/mediaquery.css')) }}
    {{HTML::style(asset('css/contenttoggle.css')) }}
    {{HTML::style(asset('css/style.css')) }}
    {{HTML::style(asset('css/default.css')) }}
    {{HTML::style(asset('css/component.css')) }}
    {{HTML::style(asset('css/default-date.css')) }}
    {{HTML::style(asset('css/default.date.css')) }}




  </head>
  <body>
 <div class="top-header">

     {{HTML::image('images/menu.png', 'menu', array('id' => 'showLeftPush') )}}
    <div class="title-place">
        <h1>Logtime</h1>
    </div>
    <div class="mob-noti">
        {{HTML::image('images/noti.png', 'meldingen', array('id' => 'showRight') )}}
        <span class="noti-aantal-mob">9</span>  {{--TODO:Hier moet de aantal notificaties komen--}}
    </div>
    <span class="noti-aantal">9</span> {{--TODO:Hier moet de aantal notificaties komen--}}
    <a href="#" id="notificationLink">{{HTML::image('images/noti.png', 'meldingen', array('class' => 'noti') )}}</a>
    <div id="notificationContainer">
        <div id="notificationTitle">Notificatie</div>
        <div id="notificationsBody" class="notifications">
            @yield("get_notifications") {{--TODO:Hier moet denotificaties komen--}}


        </div>
        <div id="notificationFooter"><a href="#">Bekijk alles</a></div>
    </div>
    {{--TODO:hier de link naar instellingen van leerling--}}
    <a href="/persoonlijke-instellingen">{{HTML::image('images/icons/instellingen-mob.png', 'Instellingen', array('class' => 'destop-instellingen', 'title' => 'Instellingen') )}}
        <p>{{{$userFullName}}}</p> {{--TODO:Hier moet de gebruikers komen--}}
    </a>
     @if(isset($user_avatar) && $user_avatar != '')
         {{HTML::image('images/'.$user_avatar, 'avatar', array('class' => 'avatar') )}}
     @else
         {{HTML::image('images/geenfoto.png', 'avatar', array('class' => 'avatar') )}}
    @endif

</div>
<div class="cbp-spmenu-push cbp-spmenu-push-toright" id="wrapper">
    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
        <div class="noti-mob-instellingen">
            <div class="mob-aantal-gelezen">
                <a href="#">  2 ongelezen</a>
            </div>
            <div class="mob-markeer-alles">
                <a href="#">Markeer alles als gelezen {{HTML::image('images/icons/oog.png', 'gelezen' )}}</a>
            </div>
        </div>
        <div class="mob-notification">
            {{HTML::image('images/icons/avatar-empty.png' )}}
            <p><b>Leerling naam </b>is aangewezen als
                nieuwe projectleider van de groep.</p>
            <span>12 feb 2014 12:45</span>
        </div>

        <div class="mob-notification">
            {{HTML::image('images/icons/avatar-empty.png' )}}
            <p><b>Leerling naam </b>is aangewezen als
                nieuwe projectleider van de groep.</p>
            <span>12 feb 2014 12:45</span>
        </div>

        <div class="mob-notification">
            {{HTML::image('images/icons/avatar-empty.png' )}}
            <p><b>Leerling naam </b>is aangewezen als
                nieuwe projectleider van de groep.</p>
            <span>12 feb 2014 12:45</span>
        </div>
    </nav>
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left menu-mob-width cbp-spmenu-open" id="cbp-spmenu-s1">
    <div class="profiel-mob">
            {{HTML::image('images/'.$user_avatar, 'avatar', array('class' => 'avatar') )}}
        <a href="/persoonlijke-instellingen">
            <p>{{{$userFullName}}}</p> {{--TODO:Hier moet de gebruikers komen--}}
        </a>
            {{HTML::image('images/icons/instellingen-mob.png', 'Instellingen', array('class' => 'mob-instellingen', 'title' => 'Instellingen') )}}
    </div>
    <div style="clear:both"></div> <!-- AUB Clearfix gebruiken! -->
    @if($user_role == 1)
        <a href="{{route('dashboard')}}"><span>{{HTML::image('images/icons/dashboard.png', 'Dashboard')}}</span>Dashboard</a>
        <a href="/logboek"><span>{{HTML::image('images/icons/logboek.png', 'Logboek')}}</span>Logboek</a>
        <a href="/projects"><span>{{HTML::image('images/icons/map.png', 'Project Aanmaken')}}</span>Project beheer</a>
        <a href="#"><span>{{HTML::image('images/icons/handleiding.png', 'Handleiding')}}</span>Handleiding</a>
        <a href="/logout"><span>{{HTML::image('images/icons/uitloggen.png', 'Uitloggen')}}</span>Uitloggen</a>
    @endif
    @if($user_role == 3)
        <a href="{{route('dashboard')}}"><span>{{HTML::image('images/icons/dashboard.png', 'Dashboard')}}</span>Dashboard</a>
        <a href="/logboek"><span>{{HTML::image('images/icons/logboek.png', 'Logboek')}}</span>Logboek</a>
        <a href="/projects"><span>{{HTML::image('images/icons/map.png', 'Project Aanmaken')}}</span>Project beheer</a>
        <a href="/groepsinstellingen"><span>{{HTML::image('images/icons/instellingen.png', 'Instellingen')}}</span>Groeps instellingen</a>
        <a href="#"><span>{{HTML::image('images/icons/handleiding.png', 'Handleiding')}}</span>Handleiding</a>
        <a href="/logout"><span>{{HTML::image('images/icons/uitloggen.png', 'Uitloggen')}}</span>Uitloggen</a>
    @endif
    @if($user_role == 2)
        <a href="{{route('dashboard')}}"><span>{{HTML::image('images/icons/dashboard.png', 'Dashboard')}}</span>Dashboard</a>
        <a href="{{route('docent.projects.index')}}"><span>{{HTML::image('images/icons/map.png', 'Project Aanmaken')}}</span>Project beheer</a>
        <a href="{{route('logout')}}"><span>{{HTML::image('images/icons/uitloggen.png', 'Uitloggen')}}</span>Uitloggen</a>
        
    @endif
    @if($user_role == 1)
    <h2>Uren bijwerken</h2>
           <form method="post">
               <select>
                   <option>Kies een project</option>
                   <option>Logtime</option>
                   <option>Pizza today</option>
                   <option>Malcom</option>
               </select>

               <select>
                   <option>Onderdeel</option>
                   <option>Fase 4</option>
               </select>
               <select>
                   <option>Taak</option>
                   <option>Fase4A</option>
               </select>
               <input type="date" id="input_01" placeholder="Datum" name="date" class="datepicker">
               <input type="text" placeholder="00:00"  class="uren">
               <p class="uren-tot">tot</p>
               <input type="text" placeholder="00:00"  class="uren">
               <textarea placeholder="Omschrijving"></textarea>
               <input type="submit" class="bijwerken" value="Bijwerken">
           </form>
        @endif
</nav>
    <section class="ac-container container-mob">
    <div>
        <input id="ac-0" name="accordion-1" type="checkbox" />
        <label class="uren-mob-invullen" for="ac-0"><img src="images/icons/uren-mob.png">Uren invullen</label>
        <article class="ac-small-mob">

           <h3>Uren bijwerken</h3>
                           <form method="post">
                               <select>
                                   <option>Kies een project</option>
                                   <option>Logtime</option>
                                   <option>Pizza today</option>
                                   <option>Malcom</option>
                               </select>

                               <select>
                                   <option>Onderdeel</option>
                                   <option>Fase 4</option>
                               </select>
                               <select>
                                   <option>Taak</option>
                                   <option>Fase4A</option>
                               </select>
                               <input type="date" id="input_01" placeholder="Datum" name="date" class="datepicker">
                               <input type="text" placeholder="00:00"  id="uren-klein">
                               <p class="uren-tot">tot</p>
                               <input type="text" placeholder="00:00"  id="uren-klein">
                               <textarea placeholder="Omschrijving"></textarea>
                               <input type="submit" class="bijwerken" value=" ">
                           </form>
        </article>
    </div>
        </section>

        <section class="ac-container">
          @yield('content')
         </section>
        {{HTML::script(asset('http://code.jquery.com/jquery-latest.min.js')) }}
        {{HTML::script(asset('js/notificatie.js')) }}
        {{HTML::script(asset('js/picker.js')) }}
        {{HTML::script(asset('js/picker.date.js')) }}
        {{HTML::script(asset('js/menuleft.js')) }}
        {{HTML::script(asset('js/legacy.js')) }}
        {{HTML::script(asset('js/Chart.js')) }}
        <!--TODO: Mijn editor zeurt dat hier een </div> ontbreekt, klopt dat? -->
        </body>
        </html><!---------------------Credits---------------------

        Class:          4D0W
        Webdesign:      Fatih celik
        Mobile design:  Dennis eilander
        Programmers:    Thiago van Dieten
                        Phillip Heemskerk
                        Yannick Berendsen
                        Fatih Celik
                        Dennis Eilander

        © 2014-2015 by Orange source. All Rights Reserved.
        -------------------------------------------------->