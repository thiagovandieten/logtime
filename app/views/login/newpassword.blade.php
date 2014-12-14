<!DOCTYPE html>
<html>
<head lang="en">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
	{{HTML::style(asset('css/mediaquery.css')) }}
    {{HTML::style(asset('css/contenttoggle.css')) }}
    {{HTML::style(asset('css/style.css')) }}
    {{HTML::style(asset('css/default.css')) }}
    {{HTML::style(asset('css/component.css')) }}
    {{HTML::style(asset('css/default-date.css')) }}
    {{HTML::style(asset('css/default.date.css')) }}
    {{HTML::script(asset('http://code.jquery.com/jquery-latest.min.js'))}}
    {{HTML::script(asset('js/jquery.backstretch.min.js'))}}

    <title>Logtime</title>

</head>
<body>

<div class="ww-vergeten-wrap">
<h1>Uw wachtwoord wijzigen</h1>
    {{ Form::open(array('route' => array('forgotpassword.store', $token))) }}
<input type="password" placeholder="Uw wachtwoord">
<input type="password" placeholder="Wachtwoord herhalen">
    {{ Form::hidden('token', $token) }}
<input type="submit" value="Opslaan">
    {{ Form::close() }}
</div>

<script>
  $.backstretch( "{{asset("images/bg.png")}}" );
</script>




</body>
</html>
<!---------------------Credits---------------------

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
