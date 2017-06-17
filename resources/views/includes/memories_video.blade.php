@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a movie.</p>
            <button class="btn btn-default deleteBtn">Delete This Memory</button>
        </div>
        <video class="video" controls>
            <source src="{{route('user.video',$entry['id'])}}" type="video/mp4" alt="Video" >
        </video><br><br>
        <div class="tab">
            <button class="tablinks" onclick="openCol(event, 'Title')">Title</button>
            <button class="tablinks" onclick="openCol(event, 'Description')">Description</button>
            <button class="tablinks" onclick="openCol(event, 'Record Date')">Record Date</button>
        </div>
        <div id="Title" class="tabcontent">
            <h3>Title</h3>
            <p>{{$entry['title']}}</p>
        </div>

        <div id="Description" class="tabcontent">
            <h3>Description</h3>
            <p>{{$entry['description']}}</p>
        </div>

        <div id="Record Date" class="tabcontent">
            <h3>Record Date</h3>
            <p>{{$entry['record_date']}}</p>
        </div>
    </div>
@endforeach