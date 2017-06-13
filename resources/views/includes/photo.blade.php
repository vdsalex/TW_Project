@foreach($entries as $entry)
    <div id="modal_id" class="modal">

        <span class="close" onclick="document.getElementById('modal_id').style.display='none'">&times;</span>

        <img class="modal-content" id="img2">

        <div id="caption2"></div>
    </div>
    <div class="jumbotron">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p  align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a photo.
        </p>

        <img  src="content/fat-frumos.jpg" alt="Photo" class="img-rounded"><br><br>
        <div class="tab">
            <button class="tablinks" onclick="openCol(event, 'Description')">Description</button>
            <button class="tablinks" onclick="openCol(event, 'Location')">Location</button>
            <button class="tablinks" onclick="openCol(event, 'Creation Date')">Creation Date</button>
        </div>
        <div id="Description" class="tabcontent">
            <h3>Description</h3>
            <p>Description is the capital city of England.</p>
        </div>

        <div id="Location" class="tabcontent">
            <h3>Location</h3>
            <p>Location is the capital of France.</p>
        </div>

        <div id="Creation Date" class="tabcontent">
            <h3>Creation Date</h3>
            <p>Creation Date is the capital of Japan.</p>
        </div>
@endforeach