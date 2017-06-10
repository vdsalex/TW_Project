{!! Html::style('css/upload.css') !!}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DiLy</title>
   
</head>
<body>

	<img id="bg-img" src="content/blue-gradient.png" alt="Blue Gradient">

    <header></header>

    <div class="container" id="mainContainer">
    @include ('includes.header')
        <div class="jumbotron" style="width:33%;float:left;">
            <h3>What would you like to upload?</h3>
            <form>
                <br><input type="radio" name="uploadType" value="Photo" onclick="displayPhoto()">Picture
                <br><input type="radio" name="uploadType" value="Film" onclick="displayFilm()">Video
                <br><input type="radio" name="uploadType" value="Scrisoare" onclick="displayScr()">Letter
                <br><input type="radio" name="uploadType" value="Artefact" onclick="displayArt()">Artefact
                <br><input type="radio" name="uploadType" value="Act" onclick="displayAct()">Act
            </form>
        </div>

        <div id="memoryOptions" class="jumbotron" style="width:33%; float:left; display:none;">
            <script src="upload.js"></script>
        </div>
    </div>

</body>
</html>

{!! Html::script('js/upload.js') !!}