<?php echo Html::style('css/my_memories.css'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	
	<title>DiLy</title>
</head>
<body>

    <div class="bladeContainer"> 
    
    <?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<img id="bg-img" src="content/blue-gradient.png" alt="Blue Gradient">

    <div id="categorySidenav" class="sidenav">
        <a href="#" id="all">All Memories</a>
        <a href="#" id="letters">Letters</a>
        <a href="#" id="iimages">Images</a>
        <a href="#" id="videos">Videos</a>
        <a href="#" id="artefacts">Artefacts</a>
        <a href="#" id="documents">Documents</a>
    </div>
    <header></header>

    <div class="container" id="mainContainer">
        <div class="jumbotron">
            <div class="profile-photo">
                <a href="./profile/profile.html"><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p  align="left"><a href="content/profile.html"> &nbsp; FirstName LastName </a> added a photo.</p>
            <p class="buttons_paragraph">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-1">Upload date</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-2">Description</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-3">Location</button>
            <div class="modal" id="modal-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select data_crearii_foto from fotografie</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select descriere_foto from fotografie</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-3">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select locatie from fotografie</h3>
                        </div>
                    </div>
                </div>

                </p>
            </div>
            <img src="content/fat-frumos.jpg" alt="Photo" class="img-rounded">
        </div>
        <div class="jumbotron ">
            <div class="profile-photo">
                <a href="./profile/profile.html"><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href="./profile/profile.html"> &nbsp; FirstName LastName </a> added a movie.</p>
            <p class="buttons_paragraph">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-4">Upload date</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-5">Description</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-6">Movie name</button>
            <div class="modal" id="modal-4">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select data_crearii_film from film</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-5">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select descriere_film from film</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-6">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select nume_film from film</h3>
                        </div>
                    </div>
                </div>
                </p>
            </div>
            <video class="video" controls>
                <source src="content/AmazingFacts.mp4" type="video/mp4">
            </video>

        </div>
        <div class="jumbotron ">
            <div class="profile-photo">
                <a href="./profile/profile.html"><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href="./profile/profile.html"> &nbsp; FirstName LastName </a> added a letter.</p>
            <p class="buttons_paragraph">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-7">Upload date</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-8">Transmitter</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-9">Receiver</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-10">Letter content</button>

            <div class="modal" id="modal-7">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select data_crearii_scr from scrisoare</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-8">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select emitator from scrisoare</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-9">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select destinatar from scrisoare</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-10">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select continut_scr from scrisoare</h3>
                        </div>
                    </div>
                </div>
            </div>
            </p>
            <p class="paragraph">
                Aici va fi afisat inceputul scrisorii lui Nume Prenume, urmand ca atunci cand veti apasa butonul Letter content sa se
                afiseze intreaga scrisoare. Asta e ceea ce cred eu ca ar fi potrivit pentru aceast obiect(scrisoare) pana in acest moment.
                Cu siguranta vor aparea modificari pe parcurs...
            </p>
        </div>
        <div class="jumbotron ">
            <div class="profile-photo">
                <a href="./profile/profile.html"><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href="./profile/profile.html"> &nbsp; FirstName LastName </a> added a document.</p>
            <p class="buttons_paragraph">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-11">Upload date*</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-12">Act name</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-13">Issue date</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-14">Issue place</button>

            <div class="modal" id="modal-11">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Ar trebui sa avem in tabelul Acte un camp care ne spune cand a facut utilizatorul upload la un act. E ceva diferit de data emiterii daca va intrebati asta</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-12">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select nume_act from acte</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-13">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select data emiterii from acte</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-14">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select locul_emiterii from acte</h3>
                        </div>
                    </div>
                </div>
            </div>
            </p>
            <img src="content/permis-romanesc-de-conducere-spania.jpg" alt="Photo" class="img-rounded">

        </div>

        <div class="jumbotron ">
            <div class="profile-photo">
                <a href="./profile/profile.html"><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href="./profile/profile.html"> &nbsp; FirstName LastName </a> added an artifact.</p>
            <p class="buttons_paragraph">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-15">Upload date</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-16">Name</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-17">Description*</button>
            <div class="modal" id="modal-15">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select data_crearii from artefact</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-16">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">This will be Select denumire_art from artefact</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modal-17">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Ar trebui totusi sa avem si o descriere, de ex. : acest lantisor l-am primit de la sotul meu acum 62 sau 63 de ani.</h3>
                        </div>
                    </div>
                </div>
            </div>

            <img src="content/colier.jpg" alt="Photo" class="img-rounded">

        </div>
    </div>
    
    </div>

</body>
</html>
<?php echo Html::script('js/my_memories.js'); ?>