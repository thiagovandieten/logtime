<!DOCTYPE html>
<html>
<head lang="en">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
	{{HTML::style(asset('css/mediaquery.css')) }}
    {{HTML::style(asset('css/style.css')) }}
    {{HTML::script(asset('http://code.jquery.com/jquery-latest.min.js'))}}
    {{HTML::script(asset('js/jquery.backstretch.min.js'))}}

    <title>Logtime</title>

</head>
<body>




<div class="ww-vergeten-wrap">
<h1>Uw wachtwoord wijzigen</h1>
<div class="registrationFormAlert" id="divCheckPasswordMatch">
</div>




{{ Form::open(array('route' => array('forgotpassword.store', $token))) }}
    {{Form::label('', '')}}
    {{Form::password('password',['placeholder' => 'Uw nieuwe wachtwoord', 'id'=>'txtNewPassword']) }}

    {{Form::label('', '')}}
    {{Form::password('password1', ['placeholder'=>'Uw wachtwoord herhalen', 'id'=>'txtConfirmPassword', 'onChange'=>'checkPasswordMatch();'])}}

    {{Form::submit('Opslaan')}}
{{Form::close()}}
</div>

<script>
function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Wachtwoorden komen niet overeen!<style>#divCheckPasswordMatch{display: block!important}</style>");
    else
        $("#divCheckPasswordMatch").html("<style>.ww-vergeten-wrap input[type='submit']{display: block!important;}</style>");
}

$(document).ready(function () {
   $("#txtConfirmPassword").keyup(checkPasswordMatch);
});

</script>





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
