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
<<<<<<< HEAD

=======
>>>>>>> 445d68b6a096bc777482940741cd97bdb6ce6a24
        <div class="jumbotron">
            <div class="poster">
                <div class="profile-photo">
                    <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width="50" height="46" ></a>
                </div>
                <p><a href=http://localhost:8000/profile>Firstname Lastname </a> added a photo.</p>
            </div>
            <img src="content/fat-frumos.jpg" alt="Photo" class="img-rounded">
<<<<<<< HEAD
            <div class="rightContainer">
                <button class="btn info" onclick="hideF()">Information</button>

                <div class="hideBut" id="info1">
                    Information1
=======
        </div>
        <div class="jumbotron ">
            <div class="poster">
                <div class="profile-photo">
                    <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
>>>>>>> 445d68b6a096bc777482940741cd97bdb6ce6a24
                </div>
                <p align="left"><a href=http://localhost:8000/profile>Firstname Lastname</a> added a movie.</p>
            </div>
<<<<<<< HEAD
        </div>

=======
            <video class="video" controls>
                <source src="content/AmazingFacts.mp4" type="video/mp4">
            </video>
        </div>
>>>>>>> 445d68b6a096bc777482940741cd97bdb6ce6a24
        <div class="jumbotron ">
            <div class="poster">
                <div class="profile-photo">
                    <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
<<<<<<< HEAD
                </div>
                <p align="left"><a href=http://localhost:8000/profile>Firstname Lastname</a> added a movie.</p>
            </div>
            <video class="video" controls>
                <source src="content/AmazingFacts.mp4" type="video/mp4">
            </video>
            <div class="rightContainer">
                <button class="btn info" onclick="hideF()">Information</button>

                <div class="hideBut" id="info2">
                    Information2
=======
>>>>>>> 445d68b6a096bc777482940741cd97bdb6ce6a24
                </div>
                <p align="left"><a href=http://localhost:8000/profile> Firstname Lastname </a> added a letter.</p>
            </div>
<<<<<<< HEAD
        </div>

=======
            <object data="content/scrisoare.txt" type="text/plain" style="height: 50%; width:50%" class="let">
                <a href="content/scrisoare.txt"></a>
            </object>
        </div>
>>>>>>> 445d68b6a096bc777482940741cd97bdb6ce6a24
        <div class="jumbotron ">
            <div class="poster">
                <div class="profile-photo">
                    <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
<<<<<<< HEAD
                </div>
                <p align="left"><a href=http://localhost:8000/profile> Firstname Lastname </a> added a letter.</p>
            </div>
            <object data="content/scrisoare.txt" type="text/plain" style="height: 50%; width:50%" class="let">
                <a href="content/scrisoare.txt"></a>
            </object>
            <div class="rightContainer">
                <button class="btn info" onclick="hideF()">Information</button>

                <div class="hideBut" id="info3">
                    Information3
                </div>
            </div>
        </div>

        <div class="jumbotron ">
            <div class="poster">
                <div class="profile-photo">
                    <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
                </div>
                <p align="left"><a href=http://localhost:8000/profile> Firstname Lastname </a> added a document.</p>
            </div>
            <object data="content/document.txt" type="text/plain" style="height: 50%; width:50%" class="let">
                <a href="content/document.txt"></a>
            </object>
            <div class="rightContainer">
                <button class="btn info" onclick="hideF()">Information</button>

                <div class="hideBut" id="info4">
                    Information4
=======
>>>>>>> 445d68b6a096bc777482940741cd97bdb6ce6a24
                </div>
                <p align="left"><a href=http://localhost:8000/profile> Firstname Lastname </a> added a document.</p>
            </div>
<<<<<<< HEAD
=======
            <object data="content/document.txt" type="text/plain" style="height: 50%; width:50%" class="let">
                <a href="content/document.txt"></a>
            </object>
>>>>>>> 445d68b6a096bc777482940741cd97bdb6ce6a24
        </div>
        <div class="jumbotron ">
            <div class="poster">
                <div class="profile-photo">
                    <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
<<<<<<< HEAD
                </div>
                <p align="left"><a href=http://localhost:8000/profile> Firstname Lastname </a> added an artefact.</p>
            </div>
            <img src="content/colier.jpg" alt="Photo" class="img-rounded">
            <div class="rightContainer">
                <button class="btn info" onclick="hideF()">Information</button>

                <div class="hideBut" id="info5">
                    Information5
=======
>>>>>>> 445d68b6a096bc777482940741cd97bdb6ce6a24
                </div>
                <p align="left"><a href=http://localhost:8000/profile> Firstname Lastname </a> added an artefact.</p>
            </div>
<<<<<<< HEAD
        </div>

=======
            <img src="content/colier.jpg" alt="Photo" class="img-rounded">
        </div>
>>>>>>> 445d68b6a096bc777482940741cd97bdb6ce6a24
    </div>
</body>
</html>

{!! Html::script('js/home.js') !!}