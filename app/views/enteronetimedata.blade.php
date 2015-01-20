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
@if ($errors->has())
		
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>		
    @endforeach

@endif
</div>
<div class="upload-foto">
<img src="images/{{$user_avatar}}" alt="avatar" title="Avatar">
<input type="submit" value="Wijzigen">
</div>


{{Form::open(array('action' => 'enteronetimedataController@save', 'files' => true, 'method' => 'post')) }}
{{Form::text('first_name','',  ['placeholder' => 'voornaam']) }}
{{Form::text('last_name','', ['placeholder' => 'achternaam']) }}
{{Form::text('street','',  ['placeholder' => 'Straatnaam', 'class' => 'adres']) }}
{{Form::text('zipcode','',  ['placeholder' => 'Postcode', 'class' => 'postcode']) }}
{{Form::text('house_number','',  ['placeholder' => 'Huisnummer']) }}
{{Form::text('city','', ['placeholder' => 'Woonplaats']) }}
{{Form::text('phone_number','',  ['placeholder' => 'telefoonnummer']) }}
{{Form::submit('Opslaan')}}
{{ Form::close() }}

</div>

<script>
  $.backstretch( "{{asset('images/bg.png')}}" );
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
