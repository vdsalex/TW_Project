

function displayPhoto()
{
    var memOptions = document.getElementById("memoryOptions");
    if (memOptions.style.display === 'none')
        memOptions.style.display = 'inline';
    memOptions.innerHTML = "<br><input type=\"text\" name=\"picDesc\"> <br><input type=\"text\" name=\"picLoc\"> <br><input type=\"Submit\" name=\"upPic\" value=\"Upload\">";
}

function displayFilm()
{
    var memOptions = document.getElementById("memoryOptions");
    if (memOptions.style.display === 'none')
        memOptions.style.display = 'inline';
    memOptions.innerHTML = "<br><input type=\"text\" name=\"vidName\"> <br><input type=\"text\" name=\"vidDesc\"> <br><input type=\"Submit\" name=\"upVid\" value=\"Upload\">";
}

function displayScr()
{
    var memOptions = document.getElementById("memoryOptions");
    if (memOptions.style.display === 'none')
        memOptions.style.display = 'inline';
    memOptions.innerHTML = "<br><input type=\"text\" name=\"dateLet\"> <br><input type=\"text\" name=\"contLet\"> <br><input type=\"Submit\" name=\"upLet\" value=\"Upload\">";
}

function displayArt()
{
    var memOptions = document.getElementById("memoryOptions");
    if (memOptions.style.display === 'none')
        memOptions.style.display = 'inline';
    memOptions.innerHTML = "<br><input type=\"text\" name=\"artName\"> <br><input type=\"text\" name=\"artDate\"> <br><input type=\"Submit\" name=\"upPic\" value=\"Upload\">";
}

function displayAct()
{
    var memOptions = document.getElementById("memoryOptions");
    if (memOptions.style.display === 'none')
        memOptions.style.display = 'inline';
    memOptions.innerHTML = "<br><input type=\"text\" name=\"actName\"> <br><input type=\"text\" name=\"actLoc\"> <br><input type=\"Submit\" name=\"upPic\" value=\"Upload\">";
}

