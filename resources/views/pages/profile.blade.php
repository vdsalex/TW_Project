{!! Html::style('css/profile.css') !!}
{!! Html::style("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css") !!}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiLy</title>
</head>
<body>

    <img id="bg-img" src="content/blue-gradient.png" alt="Blue Gradient">

    @include ('includes.header')

    <div class="container" id="h1AndBtns">
        <h2>Your Relatives</h2>
        <div class="relDegree">
            <button type="button" class="btn btn-default" onclick="displayDg(this)">1st Degree</button>
        </div>
        <div class="relDegree">
            <button type="button" class="btn btn-default" onclick="displayDg(this)">2nd Degree</button>
        </div>
        <div class="relDegree">
            <button type="button" class="btn btn-default" onclick="displayDg(this)">3rd Degree</button>
        </div>
        <div class="relDegree">
            <button type="button" class="btn btn-default" onclick="displayDg(this)">4th Degree</button>
        </div>
    </div>

    <div class="member">
        <img src="icons/mother_icon.png" alt="Member's Photo" id="membersPhoto">
        <p class="memName">Mother Elizabeth</p>
        <p class="lived">1936 - 2009</p>
    </div>

</body>
</html>

{!! Html::script('js/profile.js') !!}