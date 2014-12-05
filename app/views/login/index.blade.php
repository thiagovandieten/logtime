<!DOCTYPE html>
<html>
<head lang="en">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/mediaquery.css" />
    <link rel="stylesheet" type="text/css" href="css/contenttoggle.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />

    <link rel="stylesheet" href="css/default-date.css">
    <link rel="stylesheet" href="css/default.date.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/picker.js"></script>
    <script src="js/picker.date.js"></script>
    <script src="js/legacy.js"></script>
    <script src="js/Chart.js"></script>
    <script src="js/jquery.backstretch.min.js" type="text/javascript"></script>

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
<p><a href="#">Wachtwoord vergeten?</a></p>
</div>

<script>
  $.backstretch("images/bg.png");
</script>
<script>

    var doughnutData = [
        {
            value: 75,
            color:"#2fcc71",
            highlight: "#80d5a4",
            label: "Voortgang"
        },
        {
            value: 25,
            color: "#d1d1d1",
            highlight: "#d1d1d1"
        }

    ];

    window.onload = function(){
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
    };



</script>
<script>
    function sliceSize(dataNum, dataTotal) {
        return (dataNum / dataTotal) * 360;
    }
    function addSlice(sliceSize, pieElement, offset, sliceID, color) {
        $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
        var offset = offset - 1;
        var sizeRotation = -179 + sliceSize;
        $("."+sliceID).css({
            "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
        });
        $("."+sliceID+" span").css({
            "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
            "background-color": color
        });
    }
    function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
        var sliceID = "s"+dataCount+"-"+sliceCount;
        var maxSize = 179;
        if(sliceSize<=maxSize) {
            addSlice(sliceSize, pieElement, offset, sliceID, color);
        } else {
            addSlice(maxSize, pieElement, offset, sliceID, color);
            iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount+1, color);
        }
    }
    function createPie(dataElement, pieElement) {
        var listData = [];
        $(dataElement+" span").each(function() {
            listData.push(Number($(this).html()));
        });
        var listTotal = 0;
        for(var i=0; i<listData.length; i++) {
            listTotal += listData[i];
        }
        var offset = 0;
        var color = [
            "cornflowerblue",
            "olivedrab",
            "orange",
            "tomato",
            "crimson",
            "purple",
            "turquoise",
            "forestgreen",
            "navy",
            "gray"
        ];
        for(var i=0; i<listData.length; i++) {
            var size = sliceSize(listData[i], listTotal);
            iterateSlices(size, pieElement, offset, i, 0, color[i]);
            $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
            offset += size;
        }
    }
    createPie(".pieID.legend", ".pieID.pie");

</script>


<script>
    $('.uren-mob-invullen').click(function(){
        $('.ac-small-mob').toggleClass('target-mob');
    });
</script>

<script type="text/javascript" >
    $(document).ready(function()
    {
        $("#notificationLink").click(function()
        {
            $("#notificationContainer").fadeToggle(300);
            $("#notification_count").fadeOut("slow");
            return false;
        });

//Document Click
        $(document).click(function()
        {
            $("#notificationContainer").hide();
        });
//Popup Click
        $("#notificationContainer").click(function()
        {
            return false
        });

    });
</script>
<script type="text/javascript">

    var $input = $( '.datepicker' ).pickadate({
        firstDay: 1
    })

    var picker = $input.pickadate('picker')
    // picker.set('disable', 'flip')

    // $('button').on('click', function() {
    //     picker.set('disable', true);
    // });

</script>

<script src="js/classie.js"></script>
<script type="text/javascript" >
    var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
            showLeftPush = document.getElementById( 'showLeftPush' ),
            menuRight = document.getElementById( 'cbp-spmenu-s2' ),
            wrapper = document.getElementById('wrapper');

    showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( wrapper, 'cbp-spmenu-push-toright' );
        classie.toggle( wrapper, 'content-big' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        classie.toggle( menuLeft, 'menu-witdh-close' );
    };



    showRight.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuRight, 'cbp-spmenu-open' );
    };


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
