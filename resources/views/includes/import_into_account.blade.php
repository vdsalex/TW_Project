@foreach($entries as $entry)

    <div id="modal_id" class="modal">

        <span class="close" onclick="document.getElementById('modal_id').style.display='none'">&times;</span>

        <img class="modal-content" id="img2">

        <div id="caption2"></div>
    </div>

    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=70" height="66" ></a>
            </div>
            <p  align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a photo.</p>
            <button class="btn btn-default deleteBtn">Delete This Memory</button>
        </div>
        <input type="button" class="button" value="Import into account" style="background-color: #4CAF52;
                color: white; padding: 15px 32px; text-align: center;font-size: 16px;margin: 4px 2px;cursor: pointer; float: right;padding-top: 5px !important;">
        <img  src="content/fat-frumos.jpg" alt="Photo" class="img-rounded"><br><br>
        <div class="rightContainer">
            <button class="btn info" onclick="hideF(this)">Information</button>
            <div class="hideBut">
                <p class="memAttribute">Description: &nbsp</p><p class="memDescription">{{$entry['description']}}</p><br><br>
                <p class="memAttribute">Location: &nbsp</p><p class="memLocation">{{$entry['location']}}</p><br><br>
                <p class="memAttribute">Creation date: &nbsp</p><p class="memCreationDate">{{$entry['snap_date']}}</p>
            </div>
        </div>
    </div>
@endforeach