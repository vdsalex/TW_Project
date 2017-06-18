@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a document.</p>
            <form action="{{route('delete.document',['id'=>$entry['id']])}}" method="post">
                <button type="submit" class="btn btn-default deleteBtn">Delete This Memory</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        <object data="{{route('user.document',$entry['id'])}}" type="text/plain" style="height: 50%; width:50%" class="let">
            <a href="{{route('user.document',$entry['id'])}}"></a>
        </object><br><br>
        <div class="rightContainer">
            <button class="btn info" onclick="hideF(this)">Information</button>
            <div class="hideBut">
                <p>Name: {{$entry['name']}}</p>
                <p>Location: {{$entry['location']}}</p>
                <p>Emission date: {{$entry['emission_date']}}</p>
            </div>
        </div>

    </div>
@endforeach