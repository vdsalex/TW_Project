@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a document.</p>
            <button class="btn btn-default deleteBtn">Delete This Memory</button>
        </div>
        <object data="{{route('user.document',$entry['id'])}}" type="text/plain" style="height: 50%; width:50%" class="let">
            <a href="{{route('user.document',$entry['id'])}}"></a>
        </object><br><br>
        <div class="tab">
            <button class="tablinks" onclick="openCol(event, 'Name')">Name</button>
            <button class="tablinks" onclick="openCol(event, 'Location')">Location</button>
            <button class="tablinks" onclick="openCol(event, 'Emission Date')">Emission Date</button>

        </div>
        <div id="Name" class="tabcontent">
            <h3>Name</h3>
            <p>{{$entry['name']}}</p>
        </div>

        <div id="Location" class="tabcontent">
            <h3>Location</h3>
            <p>{{$entry['location']}}</p>
        </div>

        <div id="Emission Date" class="tabcontent">
            <h3>Emission Date</h3>
            <p>{{$entry['emission_date']}}</p>
        </div>

    </div>
@endforeach