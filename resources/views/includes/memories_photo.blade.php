@foreach($entries as $entry)
    <div id="modal_id" class="modal">

        <span class="close" onclick="document.getElementById('modal_id').style.display='none'">&times;</span>

        <img class="modal-content" id="img2">

        <div id="caption2"></div>
    </div>
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p  align="left"><a href=http://localhost:8000/profile> &nbsp; You </a> added a photo.
        </p>

        <img  src={{route('user.photo',$entry['id'])}} alt="{{$entry['id']}}" class="img-rounded"><br><br>
        <div class="tab">
            <button class="tablinks" onclick="openCol(event, 'Description')">Description</button>
            <button class="tablinks" onclick="openCol(event, 'Location')">Location</button>
            <button class="tablinks" onclick="openCol(event, 'Creation Date')">Creation Date</button>
        </div>
        <div id="Description" class="tabcontent">
            <h3>Description</h3>
            <p>{{$entry['description']}}</p>
        </div>

        <div id="Location" class="tabcontent">
            <h3>Location</h3>
            <p>{{$entry['location']}}</p>
        </div>

        <div id="Creation Date" class="tabcontent">
            <h3>Creation Date</h3>
            <p>{{$entry['snap_date']}}</p>
        </div>
    </div>
@endforeach