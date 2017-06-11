{!! Html::style('css/upload.css') !!}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DiLy</title>
   
</head>
<body>

	<img id="bg-img" src="content/blue-gradient.png" alt="Blue Gradient">

    <header></header>

    <div class="container" id="mainContainer">
    @include ('includes.header')
        <p id="question">What do you want to upload?</p>
        <div class="tab">
            <button class="tablinks" onclick="openObject(event, 'Artefact')" id="defaultOpen">Artefact</button>
            <button class="tablinks" onclick="openObject(event, 'Document')">Document</button>
            <button class="tablinks" onclick="openObject(event, 'Letter')">Letter</button>
            <button class="tablinks" onclick="openObject(event, 'Picture')">Picture</button>
            <button class="tablinks" onclick="openObject(event, 'Video')">Video</button>
        </div>

        <div id="Artefact" class="tabcontent">
            <h3>Artefact</h3>
            <div class="contentObj">
                <form >
                    Name:<br>
                    <input type="text" name="name">
                    <br>
                    Description:<br>
                    <textarea rows="5" cols="50" >Please add a description column in the database</textarea>
                    <br>
                    Date of receiving:<br>
                    <input type="text" name="receive_date">
                    <br><br>
                    <input type="file" name="image" class="form-control"  style="width:300px; background: rgba(75,195,230,0.45)" >
                    <br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>

        <div id="Document" class="tabcontent">
            <h3>Document</h3>
            <div class="contentObj">
                <form >
                    Name:<br>
                    <input type="text" name="name">
                    <br>
                    Emission location:<br>
                    <input type="text" name="location">
                    <br>
                    Emission date:<br>
                    <input type="text" name="emission_date">
                    <br><br>
                    <input type="file" name="image" class="form-control"  style="width:300px; background: rgba(75,195,230,0.45)" >
                    <br>
                    <input type="submit" value="Submit">
                </form>

            </div>
        </div>

        <div id="Letter" class="tabcontent">
            <h3>Letter</h3>
            <div class="contentObj">
                <form >
                    Sender:<br>
                    <input type="text" name="sender">
                    <br>
                    Receiver:<br>
                    <input type="text" name="receiver">
                    <br>
                    Message:<br>
                    <textarea rows="5" cols="50" ></textarea>
                    <br>
                    Date of writing<br>
                    <input type="text" name="write_data">
                    <br><br>
                    <input type="file" name="image" class="form-control"  style="width:300px; background: rgba(75,195,230,0.45)" >
                    <br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>

        <div id="Picture" class="tabcontent">
            <h3>Picture</h3>
            <div class="contentObj">
                <form >
                    Description:<br>
                    <textarea rows="4" cols="50" ></textarea>
                    <br>
                    Location:<br>
                    <input type="text" name="title">
                    <br>
                    Creation date:<br>
                    <input type="text" name="record_date">
                    <br><br>
                    <input type="file" name="image" class="form-control"  style="width:300px; background: rgba(75,195,230,0.45)" >
                    <br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>

        <div id="Video" class="tabcontent">
            <h3>Video</h3>
            <div class="contentObj">
                <form >
                    Title:<br>
                    <input type="text" name="title">
                    <br>
                    Description:<br>
                    <textarea rows="4" cols="50" ></textarea>
                    <br>
                    Record date:<br>
                    <input type="text" name="record_date">
                    <br><br>
                    <input type="file" name="image" class="form-control"  style="width:300px; background: rgba(75,195,230,0.45)" >
                    <br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>

    </div>

</body>
</html>
{!! Html::script('js/upload.js') !!}