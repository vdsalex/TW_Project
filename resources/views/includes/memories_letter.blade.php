@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a letter.</p>
        <object data="{{route('user.letter',$entry['id'])}}" type="text/plain" style="height: 50%; width:50%" class="let">
            <a href="{{route('user.letter',$entry['id'])}}"></a>
        </object><br><br>
        <div class="tab">
            <button class="tablinks" onclick="openCol(event, 'Sender')">Sender</button>
            <button class="tablinks" onclick="openCol(event, 'Receiver')">Receiver</button>
            <button class="tablinks" onclick="openCol(event, 'Message')">Message</button>
            <button class="tablinks" onclick="openCol(event, 'Writing Date')">Writing Date</button>
        </div>
        <div id="Sender" class="tabcontent">
            <h3>Sender</h3>
            <p>{{$entry['sender']}}</p>
        </div>

        <div id="Receiver" class="tabcontent">
            <h3>Receiver</h3>
            <p>{{$entry['receiver']}}</p>
        </div>

        <div id="Message" class="tabcontent">
            <h3>Message</h3>
            <p>{{$entry['message']}}</p>
        </div>

        <div id="Writing Date" class="tabcontent">
            <h3>Writing Date</h3>
            <p>{{$entry['writing_date']}}</p>
        </div>
    </div>
@endforeach