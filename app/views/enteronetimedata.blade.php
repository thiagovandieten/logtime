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



<div class="eenmalig-wrap">
<h1>Voer uw gegevens in</h1>
<div class="error eenmalig-error">
[hier komt error berichten]
</div>
<div class="upload-foto">
<img src="images/{{$user_avatar}}" alt="avatar" title="Avatar">
<input type="submit" value="Wijzigen">
</div>
<input type="text" placeholder="Voornaam">
<input type="text" placeholder="Achternaam">
<input type="text" placeholder="Adres" class="adres">
<input type="text" placeholder="Postcode" class="postcode">
<input type="text" placeholder="Woonplaats">
<input type="text" placeholder="Telefoonnummer">
<input type="submit" value="Opslaan">
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
