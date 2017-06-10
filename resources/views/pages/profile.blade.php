{!! Html::style('css/profile.css') !!}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiLy</title>
</head>
<body>

    <img id="bg-img" src="content/blue-gradient.png" alt="Blue Gradient">

    @include ('includes.header')

    <div class="container" id="h1AndBtns">
        <h2>Your Relatives<span class="glyphicon glyphicon-leaf"></span></h2>
        <div class="relDegree">
            <button type="button" class="btn btn-default" onclick="displayDg(this)">1st Degree</button>
            <span class="glyphicon glyphicon-plus" onclick="createMember(this)"></span>
        </div>
        <div class="relDegree">
            <button type="button" class="btn btn-default" onclick="displayDg(this)">2nd Degree</button>
            <span class="glyphicon glyphicon-plus" onclick="createMember(this)"></span>
        </div>
        <div class="relDegree">
            <button type="button" class="btn btn-default" onclick="displayDg(this)">3rd Degree</button>
            <span class="glyphicon glyphicon-plus" onclick="createMember(this)"></span>
        </div>
        <div class="relDegree">
            <button type="button" class="btn btn-default" onclick="displayDg(this)">4th Degree</button>
            <span class="glyphicon glyphicon-plus" onclick="createMember(this)"></span>
        </div>
    </div>

    <div class="modal">
        <div class="container" id="memOptionsContent1">
            <div class="modal-header">
                <span>SET THE PARAMETERS FOR THE NEW MEMBER</span>
            </div>
            <div class="container" id="dgTitle1">
                <span>Relative Type</span>
            </div>
            <div class="container" id="dgContainer1">
                <label class="radio-inline"><input name="1stDgOpts" type="radio" value="Mother" aria-label="Mother" onclick="displayDefaultPhoto(this)" checked> Mother &nbsp</label>
                <label class="radio-inline"><input name="1stDgOpts" type="radio" value="Father" aria-label="Father" onclick="displayDefaultPhoto(this)"> Father &nbsp</label><br>
                <label class="radio-inline"><input name="1stDgOpts" type="radio" value="Son" aria-label="Son" onclick="displayDefaultPhoto(this)"> Son &nbsp</label>
                <label class="radio-inline"><input name="1stDgOpts" type="radio" value="Daughter" aria-label="Daughter" onclick="displayDefaultPhoto(this)"> Daughter &nbsp</label>
            </div>
            <div class="container" id="nameTitle1">
                <span>Name</span>
            </div>
            <div class="container" id="nameContainer1">
                <label><input type="text"></label>
            </div>
            <div class="container" id="photoTitle1">
                <span>Photo</span>
            </div>
            <div class="container" id="photoMainContainer1">
                <label id="photoBtn1" class="btn btn-default btn-file" onclick="getUploadedPhoto(this)">Choose Photo<input type="file" id="photoInput1" style="display: none;"></label>
                <div class="container" id="photoContainer1">
                    <img src="" alt="Member Photo" class="membersPhoto" id="photoImg1">
                </div>
            </div>
        </div>
    </div>

    <div class="modal">
        <div class="container" id="memOptionsContent2">
            <div class="modal-header">
                <span>SET THE PARAMETERS FOR THE NEW MEMBER</span>
            </div>
            <div class="container" id="dgTitle2">
                <span>Relative Type</span>
            </div>
            <div class="container" id="dgContainer2">
                <label class="radio-inline"><input name="2ndDgOpts" type="radio" value="Grandmother" aria-label="Grandmother" onclick="displayDefaultPhoto(this)" checked> Grandmother &nbsp</label>
                <label class="radio-inline"><input name="2ndDgOpts" type="radio" value="Grandfather" aria-label="Grandfather" onclick="displayDefaultPhoto(this)"> Grandfather &nbsp</label><br>
                <label class="radio-inline"><input name="2ndDgOpts" type="radio" value="Grandson" aria-label="Grandson" onclick="displayDefaultPhoto(this)"> Grandson &nbsp</label>
                <label class="radio-inline"><input name="2ndDgOpts" type="radio" value="Granddaughter" aria-label="Granddaughter" onclick="displayDefaultPhoto(this)"> Granddaughter &nbsp</label><br>
                <label class="radio-inline"><input name="2ndDgOpts" type="radio" value="Brother" aria-label="Brother" onclick="displayDefaultPhoto(this)"> Brother &nbsp</label>
                <label class="radio-inline"><input name="2ndDgOpts" type="radio" value="Sister" aria-label="Sister" onclick="displayDefaultPhoto(this)"> Sister &nbsp</label>
            </div>
            <div class="container" id="nameTitle2">
                <span>Name</span>
            </div>
            <div class="container" id="nameContainer2">
                <label><input type="text"></label>
            </div>
            <div class="container" id="photoTitle2">
                <span>Photo</span>
            </div>
            <div class="container" id="photoMainContainer2">
                <label id="photoBtn2" class="btn btn-default btn-file" onclick="getUploadedPhoto(this)">Choose Photo<input type="file" id="photoInput2" style="display: none;"></label>
                <div class="container" id="photoContainer2">
                    <img src="" alt="Member Photo" class="membersPhoto" id="photoImg2">
                </div>
            </div>
        </div>
    </div>

    <div class="modal">
        <div class="container" id="memOptionsContent3">
            <div class="modal-header">
                <span>SET THE PARAMETERS FOR THE NEW MEMBER</span>
            </div>
            <div class="container" id="dgTitle3">
                <span>Relative Type</span>
            </div>
            <div class="container" id="dgContainer3">
                <label class="radio-inline"><input name="3rdDgOpts" type="radio" value="Nephew" aria-label="Nephew" onclick="displayDefaultPhoto(this)" checked> Nephew &nbsp</label>
                <label class="radio-inline"><input name="3rdDgOpts" type="radio" value="Niece" aria-label="Niece" onclick="displayDefaultPhoto(this)"> Niece &nbsp</label>
                <label class="radio-inline"><input name="3rdDgOpts" type="radio" value="Uncle" aria-label="Uncle" onclick="displayDefaultPhoto(this)"> Uncle &nbsp</label>
                <label class="radio-inline"><input name="3rdDgOpts" type="radio" value="Aunt" aria-label="Aunt" onclick="displayDefaultPhoto(this)"> Aunt &nbsp</label><br>
                <label class="radio-inline"><input name="3rdDgOpts" type="radio" value="GtGrandson" aria-label="GtGrandson" onclick="displayDefaultPhoto(this)"> Great Grandson &nbsp</label>
                <label class="radio-inline"><input name="3rdDgOpts" type="radio" value="GtGranddaughter" aria-label="GtGranddaughter" onclick="displayDefaultPhoto(this)"> Great Granddaughter &nbsp</label><br>
                <label class="radio-inline"><input name="3rdDgOpts" type="radio" value="GtGrandmother" aria-label="GtGrandmother" onclick="displayDefaultPhoto(this)"> Great Grandmother &nbsp</label>
                <label class="radio-inline"><input name="3rdDgOpts" type="radio" value="GtGrandfather" aria-label="GtGrandfather" onclick="displayDefaultPhoto(this)"> Great Grandfather &nbsp</label>
            </div>
            <div class="container" id="nameTitle3">
                <span>Name</span>
            </div>
            <div class="container" id="nameContainer3">
                <label><input type="text"></label>
            </div>
            <div class="container" id="photoTitle3">
                <span>Photo</span>
            </div>
            <div class="container" id="photoMainContainer3">
                <label id="photoBtn3" class="btn btn-default btn-file" onclick="getUploadedPhoto(this)">Choose Photo<input type="file" id="photoInput3" style="display: none;"></label>
                <div class="container" id="photoContainer3">
                    <img src="" alt="Member Photo" class="membersPhoto" id="photoImg3">
                </div>
            </div>
        </div>
    </div>

    <div class="modal">
        <div class="container" id="memOptionsContent4">
            <div class="modal-header">
                <span>SET THE PARAMETERS FOR THE NEW MEMBER</span>
            </div>
            <div class="container" id="dgTitle4">
                <span>Relative Type</span>
            </div>
            <div class="container" id="dgContainer4">
                <label class="radio-inline"><input name="4thDgOpts" type="radio" value="GtGtGrandson" aria-label="GtGtGrandson" onclick="displayDefaultPhoto(this)" checked> Great-Great Grandson &nbsp</label>
                <label class="radio-inline"><input name="4thDgOpts" type="radio" value="GtGtGranddaughter" aria-label="GtGtGranddaughter" onclick="displayDefaultPhoto(this)"> Great-Great Granddaughter &nbsp</label><br>
                <label class="radio-inline"><input name="4thDgOpts" type="radio" value="GtGrandmother" aria-label="GtGrandmother" onclick="displayDefaultPhoto(this)"> Great Grandmother &nbsp</label>
                <label class="radio-inline"><input name="4thDgOpts" type="radio" value="GtGrandfather" aria-label="GtGrandfather" onclick="displayDefaultPhoto(this)"> Great Grandfather &nbsp</label><br>
                <label class="radio-inline"><input name="4thDgOpts" type="radio" value="Cousin sister" aria-label="Cousin sister" onclick="displayDefaultPhoto(this)"> Cousin Sister &nbsp</label>
                <label class="radio-inline"><input name="4thDgOpts" type="radio" value="Cousin brother" aria-label="Cousin brother" onclick="displayDefaultPhoto(this)"> Cousin Brother &nbsp</label><br>
                <label class="radio-inline"><input name="4thDgOpts" type="radio" value="GtNephew" aria-label="GtNephew" onclick="displayDefaultPhoto(this)"> Great Nephew &nbsp</label>
                <label class="radio-inline"><input name="4thDgOpts" type="radio" value="GtNiece" aria-label="GtNiece" onclick="displayDefaultPhoto(this)"> Great Niece &nbsp</label><br>
                <label class="radio-inline"><input name="4thDgOpts" type="radio" value="GtUncle" aria-label="GtUncle" onclick="displayDefaultPhoto(this)"> Great Uncle &nbsp</label>
                <label class="radio-inline"><input name="4thDgOpts" type="radio" value="GtAunt" aria-label="GtAunt" onclick="displayDefaultPhoto(this)"> Great Aunt &nbsp</label>
            </div>
            <div class="container" id="nameTitle4">
                <span>Name</span>
            </div>
            <div class="container" id="nameContainer4">
                <label><input type="text"></label>
            </div>
            <div class="container" id="photoTitle4">
                <span>Photo</span>
            </div>
            <div class="container" id="photoMainContainer4">
                <label id="photoBtn4" class="btn btn-default btn-file" onclick="getUploadedPhoto(this)">Choose Photo<input type="file" id="photoInput4" style="display: none;"></label>
                <div class="container" id="photoContainer4">
                    <img src="" alt="Member Photo" class="membersPhoto" id="photoImg4">
                </div>
            </div>
        </div>
    </div>
</body>
</html>

{!! Html::script('js/profile.js') !!}