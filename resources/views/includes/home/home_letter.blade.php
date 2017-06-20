@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="{{url('userimage/' . $entry['user_id'] . '/'. $entry['username'])}}"
                                                           alt="Profile Photo" width=70" height="66" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp; {{$entry['first_name'] . ' ' . $entry['last_name']}} </a> added a letter.</p>

        </div>
        <object data="{{route('user.letter',$entry['id'])}}" type="text/plain"  class="let">
            <a href="{{route('user.letter',$entry['id'])}}"></a>
        </object><br><br>
        <div class="rightContainer">
            <button class="btn info" onclick="hideF(this)">Information</button>
            <div class="hideBut">
                <p class="memAttribute">Sender: &nbsp</p><p class="memLocation">{{$entry['sender']}}</p><br><br>
                <p class="memAttribute">Receiver: &nbsp</p><p class="memLocation">{{$entry['receiver']}}</p><br><br>
                <p class="memAttribute">Message: &nbsp</p><p class="memDescription">{{$entry['message']}}</p><br><br>
                <p class="memAttribute">Writing date: &nbsp</p><p class="memCreationDate">{{$entry['write_date']}}</p>
            </div>
        </div>

    </div>
@endforeach