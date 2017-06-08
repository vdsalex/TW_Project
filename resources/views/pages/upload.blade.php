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
            <h2>Ce vrei sa incarci?</h2>
            <form>
                <br><input type="radio" name="uploadType" value="Photo" onclick="displayPhoto()">Photo
                <br><input type="radio" name="uploadType" value="Film" onclick="displayFilm()">Film
                <br><input type="radio" name="uploadType" value="Scrisoare" onclick="displayScr()">Scrisoare
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