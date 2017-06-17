@foreach($entries as $entry)

    <<div id="modal_id" class="modal">

        <span class="close" onclick="document.getElementById('modal_id').style.display='none'">&times;</span>

        <img class="modal-content" id="img2">

        <div id="caption2"></div>
    </div>

    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added an artefact.</p>
            <button class="btn btn-default deleteBtn">Delete This Memory</button>
        </div>
        <img src="{{route('user.artefact',$entry['id'])}}" alt="Photo" class="img-rounded"><br><br>
        <div class="tab">
            <button class="tablinks" onclick="openCol(event, 'Name')">Name</button>
            <button class="tablinks" onclick="openCol(event, 'Description')">Description</button>
            <button class="tablinks" onclick="openCol(event, 'Receiving Date')">Receiving Date</button>

        </div>
        <div id="Name" class="tabcontent">
            <h3>Name</h3>
            <p>{{$entry['name']}}</p>
        </div>

        <div id="Description" class="tabcontent">
            <h3>Description</h3>
            <p>{{$entry['description']}}</p>
        </div>

        <div id="Receiving Date" class="tabcontent">
            <h3>Receiving Date</h3>
            <p>{{$entry['receive_date']}}</p>
        </div>

    </div>

@endforeach