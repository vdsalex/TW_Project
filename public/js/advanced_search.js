var memParamsDiv;

function displayDocumentOptions()
{
    memParamsDiv.style.display = "none";
    document.getElementById("documentOptions").style.display = "inline";
    memParamsDiv = document.getElementById("documentOptions");
}

function displayArtifactOptions()
{
    memParamsDiv.style.display = "none";
    document.getElementById("artifactOptions").style.display = "inline";
    memParamsDiv = document.getElementById("artifactOptions");
}

function displayPhotoOptions()
{
    memParamsDiv.style.display = "none";
    document.getElementById("photoOptions").style.display = "inline";
    memParamsDiv = document.getElementById("photoOptions");
}

function displayVideoOptions()
{
    memParamsDiv.style.display = "none";
    document.getElementById("videoOptions").style.display = "inline";
    memParamsDiv = document.getElementById("videoOptions");
}

function displayLetterOptions()
{
    memParamsDiv.style.display = "none";
    document.getElementById("letterOptions").style.display = "inline";
    memParamsDiv = document.getElementById("letterOptions");
}

memParamsDiv = document.getElementById("documentOptions");
displayDocumentOptions();