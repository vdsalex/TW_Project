

function displayPhoto()
{
    var memOptions = document.getElementById("memoryOptions");
    if (memOptions.style.display === 'none')
        memOptions.style.display = 'inline';
   // memOptions.innerHTML = "<br><label for=\"description\">Descriere: </label><input type=\"text\" name=\"picDesc\"> <br>Locatie:  <input type=\"text\" name=\"picLoc\"> <br><input type=\"Submit\" name=\"upPic\" value=\"Upload\">";
    memOptions.innerHTML = "<form class=\"form-horizontal picture-upload\"> <fieldset><div class=\"control-group\"> <label class=\"control-label\" for=\"pictureTitle\">Title</label> <div class=\"controls\"> <input id=\"pictureTitle\" name=\"pictureTitle\" type=\"text\" placeholder=\"Name\" class=\"input-xlarge\"> </div> </div> <div class=\"control-group\"> <label class=\"control-label\" for=\"pictureDescription\">Description</label> <div class=\"controls\"> <textarea id=\"pictureDescription\" name=\"pictureDescription\" class=\"form-control\" rows=\"5\"></textarea> </div> </div> <!-- File Button --> <div class=\"control-group\"> <label class=\"control-label\" for=\"pictureFileButton\">Picture File</label> <div class=\"controls\"> <input id=\"pictureFileButton\" name=\"pictureFileButton\" class=\"input-file\" type=\"file\"> </div> </div> <!-- Button --> <div class=\"control-group\"> <label class=\"control-label\" for=\"uploadPictureButton\"></label> <div class=\"controls\"> <button id=\"uploadPictureButton\" name=\"uploadPictureButton\" class=\"btn btn-info\">Upload</button> </div> </div> </fieldset> </form>"
}

function displayFilm()
{
    var memOptions = document.getElementById("memoryOptions");
    if (memOptions.style.display === 'none')
        memOptions.style.display = 'inline';
   // memOptions.innerHTML = "<br><input type=\"text\" name=\"vidName\"> <br><input type=\"text\" name=\"vidDesc\"> <br><input type=\"Submit\" name=\"upVid\" value=\"Upload\">";
    memOptions.innerHTML="<form class=\"form-horizontal\">\
<fieldset>\
<!-- Text input-->\
<div class=\"control-group\">\
    <label class=\"control-label\" for=\"title\">Title</label>\
    <div class=\"controls\">\
    <input id=\"videoTitle\" name=\"videoTitle\" type=\"text\" placeholder=\"Name\" class=\"input-xlarge\">\
\
    </div>\
    </div>\
\
    <!-- Textarea -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"videoDescription\">Description</label>\
    <div class=\"controls\">\
    <textarea id=\"Description\" name=\"videoDescription\"></textarea>\
    </div>\
    </div>\
    \
    <!-- File Button -->\
<div class=\"control-group\">\
    <label class=\"control-label\" for=\"videoFileButton\">Video File</label>\
<div class=\"controls\">\
    <input id=\"videoFileButton\" name=\"videoFileButton\" class=\"input-file\" type=\"file\">\
    </div>\
    </div>\
    \
    <!-- Button -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"videoUploadButton\"></label>\
    <div class=\"controls\">\
    <button id=\"videoUploadButton\" name=\"videoUploadButton\" class=\"btn btn-info\">Upload</button>\
    </div>\
    </div>\
    \
    </fieldset>\
    </form>"
}

function displayScr()
{
    var memOptions = document.getElementById("memoryOptions");
    if (memOptions.style.display === 'none')
        memOptions.style.display = 'inline';
    //memOptions.innerHTML = "<br><input type=\"text\" name=\"dateLet\"> <br><input type=\"text\" name=\"contLet\"> <br><input type=\"Submit\" name=\"upLet\" value=\"Upload\">";
    memOptions.innerHTML="<form class=\"form-horizontal\">\
<fieldset>\
<!-- Text input-->\
<div class=\"control-group\">\
    <label class=\"control-label\" for=\"letterSender\">Sender</label>\
    <div class=\"controls\">\
    <input id=\"letterSender\" name=\"letterSender\" type=\"text\" placeholder=\"Name\" class=\"input-xlarge\">\
\
    </div>\
    </div>\
    \
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"letterReceiver\">Receiver</label>\
    <div class=\"controls\">\
    <input id=\"letterReceiver\" name=\"letterReceiver\" type=\"text\" placeholder=\"Name\" class=\"input-xlarge\">\
\
    </div>\
    </div>\
\
    <!-- Textarea -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"letterContent\">Letter</label>\
    <div class=\"controls\">\
    <textarea id=\"letterContent\" name=\"letterContent\"></textarea>\
    </div>\
    </div>\
    \
    <!-- Button -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"letterUploadButton\"></label>\
    <div class=\"controls\">\
    <button id=\"letterUploadButton\" name=\"letterUploadButton\" class=\"btn btn-info\">Upload</button>\
    </div>\
    </div>\
    \
    </fieldset>\
    </form>"
}

function displayArt()
{
    var memOptions = document.getElementById("memoryOptions");
    if (memOptions.style.display === 'none')
        memOptions.style.display = 'inline';
    //memOptions.innerHTML = "<br><input type=\"text\" name=\"artName\"> <br><input type=\"text\" name=\"artDate\"> <br><input type=\"Submit\" name=\"upPic\" value=\"Upload\">";
    memOptions.innerHTML="<form class=\"form-horizontal\">\
<fieldset>\
<!-- Text input-->\
<div class=\"control-group\">\
    <label class=\"control-label\" for=\"artType\">Type</label>\
    <div class=\"controls\">\
    <input id=\"artType\" name=\"artType\" type=\"text\" placeholder=\"Name\" class=\"input-xlarge\">\
\
    </div>\
    </div>\
\
    <!-- Textarea -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"artDescription\">Date</label>\
    <div class=\"controls\">\
    <input type=\"text\" id=\"artDescription\" name=\"artDescription\">\
    </div>\
    </div>\
    \
    <!-- Button -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"artUploadButton\"></label>\
    <div class=\"controls\">\
    <button id=\"artUploadButton\" name=\"artUploadButton\" class=\"btn btn-info\">Upload</button>\
    </div>\
    </div>\
    \
    </fieldset>\
    </form>"
}

function displayAct()
{
    var memOptions = document.getElementById("memoryOptions");
    if (memOptions.style.display === 'none')
        memOptions.style.display = 'inline';
    //memOptions.innerHTML = "<br><input type=\"text\" name=\"actName\"> <br><input type=\"text\" name=\"actLoc\"> <br><input type=\"Submit\" name=\"upPic\" value=\"Upload\">";
    memOptions.innerHTML="<form class=\"form-horizontal\">\
<fieldset>\
<!-- Text input-->\
<div class=\"control-group\">\
    <label class=\"control-label\" for=\"actTitle\">Title</label>\
    <div class=\"controls\">\
    <input id=\"actTitle\" name=\"actTitle\" type=\"text\" placeholder=\"Name\" class=\"input-xlarge\">\
\
    </div>\
    </div>\
\
    <!-- Textarea -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"actLocation\">Location</label>\
    <div class=\"controls\">\
    <input type=\"text\" id=\"actLocation\" name=\"actLocation\" class=\"input-xlarge\">\
    </div>\
    </div>\
    \
    <!-- Button -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"actUploadButton\"></label>\
    <div class=\"controls\">\
    <button id=\"actUploadButton\" name=\"actUploadButton\" class=\"btn btn-info\">Upload</button>\
    </div>\
    </div>\
    \
    </fieldset>\
    </form>"
}

