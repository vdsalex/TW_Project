@foreach($entries as $entry)
    <div class="jumbotron ">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a document.</p>
        <object data="content/document.txt" type="text/plain" style="height: 50%; width:50%" class="let">
            <a href="content/document.txt"></a>
        </object><br><br>
        <div class="tab">
            <button class="tablinks" onclick="openCol(event, 'Name')">Name</button>
            <button class="tablinks" onclick="openCol(event, 'Location')">Location</button>
            <button class="tablinks" onclick="openCol(event, 'Emission Date')">Emission Date</button>

        </div>
        <div id="Name" class="tabcontent">
            <h3>Name</h3>
            <p>Name is the capital city of England.</p>
        </div>

        <div id="Location" class="tabcontent">
            <h3>Location</h3>
            <p>Location is the capital of France.</p>
        </div>

        <div id="Emission Date" class="tabcontent">
            <h3>Emission Date</h3>
            <p>Emission Date is the capital of Japan.</p>
        </div>

    </div>
@endforeach