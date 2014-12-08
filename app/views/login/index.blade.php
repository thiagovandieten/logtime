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

    <!-- 
     Note: Fatih: Fix dit naar blade syntax (Zie regel 6 t/m 10)
    -->
    <link rel="stylesheet" href="css/default-date.css">
    <link rel="stylesheet" href="css/default.date.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    {{HTML::script(asset('js/jquery.backstretch.min.js'))}}

    <title>Logtime</title>

</head>
<body>

<div class="login-wrap">
<h1>Logtime</h1>
@if(strlen($errors->first()) >=1)
<div class="error">
{{{ $errors->first()}}}
</div>
@endif



{{Form::model(array('route' => 'login.authentication'))}}
    {{Form::label('', '')}}
    {{Form::text('login','',['placeholder' => 'Gebruikersnaam']) }}

    {{Form::label('', '')}}
    {{Form::password('password', ['placeholder'=>'Wachtwoord'])}}

    {{Form::submit('Inloggen')}}
{{Form::close()}}

<p>{{HTML::linkRoute('forgotpassword.index', 'Wachtwoord vergeten?')}}</p>
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
