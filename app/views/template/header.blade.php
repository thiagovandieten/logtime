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
        <span class="noti-aantal-mob">@yield("notiamount")</span>
    </div>
    <span class="noti-aantal">@yield("notiamount")</span>
    <a href="#" id="notificationLink"> <img src="images/noti.png" alt="meldingen" class="noti"></a>
    <div id="notificationContainer">
        <div id="notificationTitle">Notificatie</div>
        <div id="notificationsBody" class="notifications">
            @yield("get_notifications")


        </div>
        <div id="notificationFooter"><a href="#">Bekijk alles</a></div>
    </div>
    <p>@yield('username')</p>
    <img src="images/foto.jpg" class="avatar" alt="avatar">

</div>