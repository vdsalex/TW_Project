

function displayPhoto()
{
    var memOptions = document.getElementById("memoryOptions");
    if (memOptions.style.display === 'none')
        memOptions.style.display = 'inline';
   // memOptions.innerHTML = "<br><label for=\"description\">Descriere: </label><input type=\"text\" name=\"picDesc\"> <br>Locatie:  <input type=\"text\" name=\"picLoc\"> <br><input type=\"Submit\" name=\"upPic\" value=\"Upload\">";
    memOptions.innerHTML = "<form class=\"form-horizontal\"> <fieldset><div class=\"control-group\"> <label class=\"control-label\" for=\"title\">Title</label> <div class=\"controls\"> <input id=\"title\" name=\"title\" type=\"text\" placeholder=\"Name\" class=\"input-xlarge\"> </div> </div> <div class=\"control-group\"> <label class=\"control-label\" for=\"Description\">Description</label> <div class=\"controls\"> <textarea id=\"Description\" name=\"Description\"></textarea> </div> </div> <!-- File Button --> <div class=\"control-group\"> <label class=\"control-label\" for=\"filebutton\">Picture File</label> <div class=\"controls\"> <input id=\"filebutton\" name=\"filebutton\" class=\"input-file\" type=\"file\"> </div> </div> <!-- Button --> <div class=\"control-group\"> <label class=\"control-label\" for=\"singlebutton\"></label> <div class=\"controls\"> <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-info\">Upload</button> </div> </div> </fieldset> </form>"
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
    <input id=\"title\" name=\"title\" type=\"text\" placeholder=\"Name\" class=\"input-xlarge\">\
\
    </div>\
    </div>\
\
    <!-- Textarea -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"Description\">Description</label>\
    <div class=\"controls\">\
    <textarea id=\"Description\" name=\"Description\"></textarea>\
    </div>\
    </div>\
    \
    <!-- File Button -->\
<div class=\"control-group\">\
    <label class=\"control-label\" for=\"filebutton\">Video File</label>\
<div class=\"controls\">\
    <input id=\"filebutton\" name=\"filebutton\" class=\"input-file\" type=\"file\">\
    </div>\
    </div>\
    \
    <!-- Button -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"singlebutton\"></label>\
    <div class=\"controls\">\
    <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-info\">Upload</button>\
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
    <label class=\"control-label\" for=\"title\">Sender</label>\
    <div class=\"controls\">\
    <input id=\"letSnd\" name=\"title\" type=\"text\" placeholder=\"Name\" class=\"input-xlarge\">\
\
    </div>\
    </div>\
    \
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"title\">Receiver</label>\
    <div class=\"controls\">\
    <input id=\"letRec\" name=\"title\" type=\"text\" placeholder=\"Name\" class=\"input-xlarge\">\
\
    </div>\
    </div>\
\
    <!-- Textarea -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"Description\">Content</label>\
    <div class=\"controls\">\
    <textarea id=\"Description\" name=\"Description\"></textarea>\
    </div>\
    </div>\
    \
    <!-- Button -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"singlebutton\"></label>\
    <div class=\"controls\">\
    <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-info\">Upload</button>\
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
    <label class=\"control-label\" for=\"title\">Type</label>\
    <div class=\"controls\">\
    <input id=\"title\" name=\"title\" type=\"text\" placeholder=\"Name\" class=\"input-xlarge\">\
\
    </div>\
    </div>\
\
    <!-- Textarea -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"Description\">Date</label>\
    <div class=\"controls\">\
    <input type=\"text\" id=\"Description\" name=\"Description\">\
    </div>\
    </div>\
    \
    <!-- Button -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"singlebutton\"></label>\
    <div class=\"controls\">\
    <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-info\">Upload</button>\
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
    <label class=\"control-label\" for=\"title\">Title</label>\
    <div class=\"controls\">\
    <input id=\"title\" name=\"title\" type=\"text\" placeholder=\"Name\" class=\"input-xlarge\">\
\
    </div>\
    </div>\
\
    <!-- Textarea -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"Description\">Location</label>\
    <div class=\"controls\">\
    <input type=\"text\" id=\"Description\" name=\"Description\" class=\"input-xlarge\">\
    </div>\
    </div>\
    \
    <!-- Button -->\
    <div class=\"control-group\">\
    <label class=\"control-label\" for=\"singlebutton\"></label>\
    <div class=\"controls\">\
    <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-info\">Upload</button>\
    </div>\
    </div>\
    \
    </fieldset>\
    </form>"
}

