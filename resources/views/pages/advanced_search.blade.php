{!! Html::style('css/advanced_search.css') !!}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DiLy</title>
</head>
<body>

	<img id="bg-img" src="content/blue-gradient.png" alt="Blue Gradient">

    <header>@include ('includes.header')</header>

    <div class="container" id="mainContainer">
        <div id="firstForm" class="searchType">
            <div class="formHeader">
                <span class="headerSpan">Multiple Memories Search</span>
            </div>
            <div class="memType">
                <span id="chooseMemTypeSpan">Choose Memory Types</span>
                <br><br>
                <label><input class="memTypeInput" type="checkbox" name="memory_type_checkbox" value="Document">Document &nbsp</label>
                <label><input class="memTypeInput" type="checkbox" name="memory_type_checkbox" value="Artifact">Artifact &nbsp</label>
                <label><input class="memTypeInput" type="checkbox" name="memory_type_checkbox" value="Video">Video &nbsp</label><br>
                <label><input class="memTypeInput" type="checkbox" name="memory_type_checkbox" value="Photo">Photo &nbsp</label>
                <label><input class="memTypeInput" type="checkbox" name="memory_type_checkbox" value="Letter">Letter &nbsp</label>
            </div>
            <div class="enterUsernameDiv">
                <span id="enterUsername">Friend's Username</span>
                <br>
                <br>
                <label><input type="text" maxlength="100" name="username"></label>
            </div>
            <div class="createdDateDiv">
                <span id="createdDateSpan">Created Date</span>
                <br>
                <br>
                <span id="betweenSpan" class="createdBetweenSpans">Between</span><br><br>
                <label><input type="date" name="createdDateMin"></label>
                <span class="createdBetweenSpans">&nbsp And &nbsp</span>
                <label><input type="date" name="createdDateMax"></label>
            </div>
            <input type="submit" class="btn btn-default" id="searchBtn">
        </div>
        <div id="secondForm" class="searchType">
            <div class="formHeader">
                <span class="headerSpan">Single Memory Search</span>
            </div>
            <div class="memType">
                <span id="chooseMemTypeSpan">Choose Memory Type</span>
                <br><br>
                <label><input id="documentOptionsInput1" class="memTypeInput" type="radio" name="memory_type_radio" value="Document" onclick="displayDocumentOptions()" checked>Document &nbsp</label>
                <label><input class="memTypeInput" type="radio" name="memory_type_radio" value="Artifact" onclick="displayArtifactOptions()">Artifact &nbsp</label>
                <label><input class="memTypeInput" type="radio" name="memory_type_radio" value="Video" onclick="displayVideoOptions()">Video &nbsp</label><br>
                <label><input class="memTypeInput" type="radio" name="memory_type_radio" value="Photo" onclick="displayPhotoOptions()">Photo &nbsp</label>
                <label><input class="memTypeInput" type="radio" name="memory_type_radio" value="Letter" onclick="displayLetterOptions()">Letter &nbsp</label>
            </div>
            <div class="memParameters">
                <span id="memParametersSpan">Memory Parameters</span>
                <br>
                <br>
                <div id="documentOptions">
                    <span id="documentOptionsSpanName" class="documentOptionsSpan">Name: &nbsp</span>
                    <label id="documentOptionsLabelName" class="documentOptionsLabel"><input name="documentsName" type="text"></label><br>
                    <span id="documentOptionsSpanEmissionLocation" class="documentOptionsSpan">Emission Location: &nbsp</span>
                    <label id="documentOptionsLabelEmissionLocation" class="documentOptionsLabel"><input name="documentsEmissionLocation" type="text"></label><br>
                    <span id="documentOptionsSpanEmissionDate" class="documentOptionsSpan">Emission Date: &nbsp</span>
                    <label id="documentOptionsLabelEmissionDate" class="documentOptionsLabel"><input name="documentsEmissionDate" type="date"></label>
                </div>
                <div id="artifactOptions">
                    <span id="artifactOptionsSpanName" class="artifactOptionsSpan">Name: &nbsp</span>
                    <label id="artifactOptionsLabelName" class="artifactOptionsLabel"><input name="artifactsName" type="text"></label><br>
                    <span id="artifactOptionsSpanDescription" class="artifactOptionsSpan">Description: &nbsp</span>
                    <label id="artifactOptionsLabelDescription" class="artifactOptionsLabel"><input name="artifactsDescription" type="text"></label><br>
                    <span id="artifactOptionsSpanRecDate" class="artifactOptionsSpan">Receiving Date: &nbsp</span>
                    <label id="artifactOptionsLabelsRecDate" class="artifactOptionsLabel"><input name="artifactsRecDate" type="date"></label>
                </div>
                <div id="videoOptions">
                    <span id="videoOptionsSpanTitle" class="videoOptionsSpan">Title: &nbsp</span>
                    <label id="videoOptionsLabelTitle" class="videoOptionsLabel"><input name="videosTitle" type="text"></label><br>
                    <span id="videoOptionsSpanDescription" class="videoOptionsSpan">Description: &nbsp</span>
                    <label id="videoOptionsLabelDescription" class="videoOptionsLabel"><input name="videosDescription" type="text"></label><br>
                    <span id="videoOptionsSpanRecDate" class="videoOptionsSpan">Record Date: &nbsp</span>
                    <label id="videoOptionsLabelRecDate" class="videoOptionsLabel"><input name="videosRecordDate" type="date"></label>
                </div>
                <div id="photoOptions">
                    <span id="photoOptionsSpanLocation" class="photoOptionsSpan">Location: &nbsp</span>
                    <label id="photoOptionsLabelLocation" class="photoOptionsLabel"><input name="photosLocation" type="text"></label><br>
                    <span id="photoOptionsSpanDescription" class="photoOptionsSpan">Description: &nbsp</span>
                    <label id="photoOptionsLabelDescription" class="photoOptionsLabel"><input name="photosDescription" type="text"></label><br>
                    <span id="photoOptionsSpanCreationDate" class="photoOptionsSpan">Date of Creation: &nbsp</span>
                    <label id="photoOptionsLabelCreationDate" class="photoOptionsLabel"><input name="photosCreationDate" type="date"></label>
                </div>
                <div id="letterOptions">
                    <span id="letterOptionsSpanSender" class="letterOptionsSpan">Sender: &nbsp</span>
                    <label id="letterOptionsLabelSender" class="letterOptionsLabel"><input name="lettersSender" type="text"></label><br>
                    <span id="letterOptionsSpanReceiver" class="letterOptionsSpan">Receiver: &nbsp</span>
                    <label id="letterOptionsLabelReceiver" class="letterOptionsLabel"><input name="lettersReceiver" type="text"></label><br>
                    <span id="letterOptionsSpanMessage" class="letterOptionsSpan">Message: &nbsp</span>
                    <label id="letterOptionsLabelMessage" class="letterOptionsLabel"><input name="lettersMessage" type="date"></label><br>
                    <span id="letterOptionsSpanWritingDate" class="letterOptionsSpan">Writing Date: &nbsp</span>
                    <label id="letterOptionsLabeWritingDate" class="letterOptionsLabel"><input name="lettersWritingDate" type="date"></label>
                </div>
            </div>
            <div class="enterUsernameDiv">
                <span id="enterUsername">Friend's Username</span>
                <br>
                <br>
                <label><input type="text" maxlength="100"></label>
            </div>
            <div class="createdDateDiv">
                <span id="createdDateSpan">Created Date</span>
                <br>
                <br>
                <span id="betweenSpan" class="createdBetweenSpans">Between</span><br><br>
                <label><input type="date"></label>
                <span class="createdBetweenSpans">&nbsp And &nbsp</span>
                <label><input type="date"></label>
            </div>
            <input type="submit" class="btn btn-default" id="searchBtn">
        </div>
    </div>


    {!! Html::script('js/advanced_search.js') !!}
</body>
</html>
