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
                <form action="{{route('upload.artefact')}}" method="POST" enctype="multipart/form-data">
                    Name:<br>
                    <input type="text" name="name">
                    <br>
                    Description:<br>
                    <textarea rows="5" cols="50" name="description"></textarea>
                    <br>
                    Date of receiving:<br>
                    <input type="text" name="receive_date">
                    <br><br>
                    <input type="file" name="artefact" class="form-control"  style="width:300px; background: rgba(75,195,230,0.45)" accept=".doc,.txt">
                    <br>
                    <input type="submit" value="Submit">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
            </div>
        </div>

        <div id="Document" class="tabcontent">
            <h3>Document</h3>
            <div class="contentObj">
                <form action="{{route('upload.document')}}" method="POST" enctype="multipart/form-data">
                    Name:<br>
                    <input type="text" name="name">
                    <br>
                    Emission location:<br>
                    <input type="text" name="location">
                    <br>
                    Emission date:<br>
                    <input type="text" name="emission_date">
                    <br><br>
                    <input type="file" name="document" class="form-control"  style="width:300px; background: rgba(75,195,230,0.45)" accept=".doc,.txt">
                    <br>
                    <input type="submit" value="Submit">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>

            </div>
        </div>

        <div id="Letter" class="tabcontent">
            <h3>Letter</h3>
            <div class="contentObj">
                <form action="{{route('upload.letter')}}" method="POST" enctype="multipart/form-data">
                    Sender:<br>
                    <input type="text" name="sender">
                    <br>
                    Receiver:<br>
                    <input type="text" name="receiver">
                    <br>
                    Message:<br>
                    <textarea rows="5" cols="50" name="message"></textarea>
                    <br>
                    Date of writing<br>
                    <input type="text" name="write_date">
                    <br><br>
                    <input type="file" name="letter" class="form-control"  style="width:300px; background: rgba(75,195,230,0.45)" accept=".doc,.txt" >
                    <br>
                    <input type="submit" value="Submit">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
            </div>
        </div>

        <div id="Picture" class="tabcontent">
            <h3>Picture</h3>
            <div class="contentObj">
                <form action="{{route('upload.photo')}}" method="POST" enctype="multipart/form-data">
                    Description:<br>
                    <textarea rows="4" cols="50"  name="description"></textarea>
                    <br>
                    Location:<br>
                    <input type="text" name="location">
                    <br>
                    Creation date:<br>
                    <input type="text" name="snap_date">
                    <br><br>
                    <input type="file" name="photo" class="form-control"  style="width:300px; background: rgba(75,195,230,0.45)" accept=".jpg,.jpeg,.png">
                    <br>
                    <input type="submit" value="Submit">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
            </div>
        </div>

        <div id="Video" class="tabcontent">
            <h3>Video</h3>
            <div class="contentObj">
                <form action="{{route('upload.video')}}" method="POST" enctype="multipart/form-data">
                    Title:<br>
                    <input type="text" name="title">
                    <br>
                    Description:<br>
                    <textarea rows="4" cols="50" name="description" ></textarea>
                    <br>
                    Record date:<br>
                    <input type="text" name="record_date">
                    <br><br>
                    <input type="file" name="video" class="form-control"  style="width:300px; background: rgba(75,195,230,0.45)" accept=".mp4,.mpg4">
                    <br>
                    <input type="submit" value="Submit">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
            </div>
        </div>

    </div>

</body>
</html>


{!! Html::script('js/upload.js') !!}