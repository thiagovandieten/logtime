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
    {{HTML::script(asset('http://code.jquery.com/jquery-latest.min.js')) }}
    {{HTML::script(asset('js/modernizr.custom.js')) }}
  </head>
  <body>
 <div class="top-header">
<img src="images/menu.png" alt="menu" id="showLeftPush">
    <div class="title-place">
        <h1>Logtime</h1>
    </div>
    <div class="mob-noti">
        <img src="images/noti.png" alt="meldingen" id="showRight">
        <span class="noti-aantal-mob">9</span>  {{--TODO:Hier moet de aantal notificaties komen--}}
    </div>
    <span class="noti-aantal">9</span> {{--TODO:Hier moet de aantal notificaties komen--}}
    <a href="#" id="notificationLink"> <img src="images/noti.png" alt="meldingen" class="noti"></a>
    <div id="notificationContainer">
        <div id="notificationTitle">Notificatie</div>
        <div id="notificationsBody" class="notifications">
            @yield("get_notifications") {{--TODO:Hier moet denotificaties komen--}}


        </div>
        <div id="notificationFooter"><a href="#">Bekijk alles</a></div>
    </div>
    <p>{{{$userFullName}}}</p> {{--TODO:Hier moet de gebruikers komen--}}
    <img src="images/foto.jpg" class="avatar" alt="avatar">

</div>
<div class="cbp-spmenu-push cbp-spmenu-push-toright" id="wrapper">
    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
        <div class="noti-mob-instellingen">
            <div class="mob-aantal-gelezen">
                <a href="#">  2 ongelezen</a>
            </div>
            <div class="mob-markeer-alles">
                <a href="#">Markeer alles als gelezen  <img src="images/icons/oog.png" alt="gelezen"></a>
            </div>
        </div>
        <div class="mob-notification">
            <img src="images/icons/avatar-empty.png">
            <p><b>Leerling naam </b>is aangewezen als
                nieuwe projectleider van de groep.</p>
            <span>12 feb 2014 12:45</span>
        </div>

        <div class="mob-notification">
            <img src="images/icons/avatar-empty.png">
            <p><b>Leerling naam </b>is aangewezen als
                nieuwe projectleider van de groep.</p>
            <span>12 feb 2014 12:45</span>
        </div>

        <div class="mob-notification">
            <img src="images/icons/avatar-empty.png">
            <p><b>Leerling naam </b>is aangewezen als
                nieuwe projectleider van de groep.</p>
            <span>12 feb 2014 12:45</span>
        </div>
    </nav>
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left menu-mob-width cbp-spmenu-open" id="cbp-spmenu-s1">
    <div class="profiel-mob">
        <img src="images/foto.jpg" class="avatar-mob" alt="avatar">
        <p>Maria van de visser</p>
        <img src="images/icons/instellingen-mob.png" class="mob-instellingen" alt="Instellingen" title="Instellingen">
    </div>
    <div style="clear:both"></div>
    <a href="#"><span><img src="images/icons/dashboard.png" alt="Dashboard"></span>Dashboard</a>
    <a href="#"><span><img src="images/icons/logboek.png" alt="Logboek"></span>Logboek</a>
    <a href="#"><span><img src="images/icons/map.png" alt="Project aanmaken"></span>Project beheer</a>
    <a href="#"><span><img src="images/icons/instellingen.png" alt="Instellingen"></span>Groeps instellingen</a>
    <a href="#"><span><img src="images/icons/handleiding.png" alt="Handleiding"></span>Handleiding</a>
    <a href="#"><span><img src="images/icons/uitloggen.png" alt="Uitloggen"></span>Uitloggen</a>

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
        <input type="text" placeholder="00:00"  class="uren">
        <p class="uren-tot">tot</p>
        <input type="text" placeholder="00:00"  class="uren">
        <textarea placeholder="Omschrijving"></textarea>
        <input type="submit" class="bijwerken" value="Bijwerken">
    </form>
</nav>
    <section class="ac-container container-mob">
    <div>
        <input id="ac-0" name="accordion-1" type="checkbox" />
        <label class="uren-mob-invullen" for="ac-0"><img src="images/icons/uren-mob.png">Uren invullen</label>
        <article class="ac-small-mob">

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
                <input type="text" placeholder="00:00"  class="uren">
                <p class="uren-tot">tot</p>
                <input type="text" placeholder="00:00"  class="uren">
                <textarea placeholder="Omschrijving"></textarea>
                <input type="submit" class="bijwerken" value="Bijwerken">
            </form>
        </article>
    </div>
        </section>

        <section class="ac-container">
          @yield('return_projects')
         </section>

        {{HTML::script(asset('js/notificatie.js')) }}
        {{HTML::script(asset('js/menuleft.js')) }}
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