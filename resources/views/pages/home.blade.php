{!! Html::style('css/home.css') !!}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewpoint" content="width = device-width, initial-scale = 1">
    <title>DiLy</title>
   
</head>
<body>
    <img id="bg-img" src="content/blue-gradient.png" alt="Blue Gradient">
    <header></header>
    @include ('includes.header')
    <div class="container" id="mainContainer">
        <div id="modal_id" class="modal">
            <span class="close" onclick="document.getElementById('modal_id').style.display='none'">&times;</span>
            <img class="modal-content" id="img2">
            <div id="caption2"></div>
        </div>


    </div>
</body>
</html>

{!! Html::script('js/home.js') !!}