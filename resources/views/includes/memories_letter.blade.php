@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a letter.</p>
            <form action="{{route('delete.letter',['id'=>$entry['id']])}}" method="post">
                <button type="submit" class="btn btn-default deleteBtn">Delete This Memory</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        <object data="{{route('user.letter',$entry['id'])}}" type="text/plain"  class="let">
            <a href="{{route('user.letter',$entry['id'])}}"></a>
        </object><br><br>
        <div class="rightContainer" style="height: 53%">
            <button class="btn info" onclick="hideF(this)">Information</button>
            <div class="hideBut">
                <p>Sender: {{$entry['sender']}}</p>
                <p>Receiver: {{$entry['receiver']}}</p>
                <p>Message: {{$entry['message']}}</p>
                <p>Writing date: {{$entry['writing_date']}}</p>
            </div>
        </div>

    </div>
@endforeach