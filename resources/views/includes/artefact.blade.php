@foreach($entries as $entry)

    <<div id="modal_id" class="modal">

        <span class="close" onclick="document.getElementById('modal_id').style.display='none'">&times;</span>

        <img class="modal-content" id="img2">

        <div id="caption2"></div>
    </div>

    <div class="jumbotron ">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added an artefact.</p>

        <img src="content/colier.jpg" alt="Photo" class="img-rounded"><br><br>
        <div class="tab">
            <button class="tablinks" onclick="openCol(event, 'Name')">Name</button>
            <button class="tablinks" onclick="openCol(event, 'Description')">Description</button>
            <button class="tablinks" onclick="openCol(event, 'Receiving Date')">Receiving Date</button>

        </div>
        <div id="Name" class="tabcontent">
            <h3>Name</h3>
            <p>Name is the capital city of England.</p>
        </div>

        <div id="Description" class="tabcontent">
            <h3>Description</h3>
            <p>Description is the capital of France.</p>
        </div>

        <div id="Receiving Date" class="tabcontent">
            <h3>Receiving Date</h3>
            <p>Receiving Date is the capital of Japan.</p>
        </div>

    </div>

@endforeach