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

<div class="container" id="mainContainer">
@include ('includes.header')

    <div id="modal_id" class="modal">

        <span class="close" onclick="document.getElementById('modal_id').style.display='none'">&times;</span>

        <img class="modal-content" id="img2">

        <div id="caption2"></div>
    </div>



    <div class="jumbotron">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p  align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a photo.</p>
        <img  src="content/fat-frumos.jpg" alt="Photo" class="img-rounded">

    </div>


    <div class="jumbotron ">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a movie.</p>

        <video class="video" controls>
            <source src="content/AmazingFacts.mp4" type="video/mp4" alt="Video" >
        </video>
    </div>


    <div class="jumbotron ">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a letter.</p>
        <object data="content/scrisoare.txt" type="text/plain" style="height: 50%; width:50%" class="let">
            <a href="content/scrisoare.txt"></a>
        </object>
    </div>


    <div class="jumbotron ">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a document.</p>
        <object data="content/document.txt" type="text/plain" style="height: 50%; width:50%" class="let">
            <a href="content/document.txt"></a>
        </object>

    </div>


    <div class="jumbotron ">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added an artefact.</p>

    <img src="content/colier.jpg" alt="Photo" class="img-rounded">


    </div>
    </div>
</div>


</body>
</html>
{!! Html::script('js/home.js') !!}