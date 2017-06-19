@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="{{route('account.image',['userId'=>$entry['user_id'],'username'=>$entry['username']])}}"
                                                           alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp;{{$entry['first_name'] . ' ' . $entry['last_name']}} </a> added a document.</p>
        </div>
        <object data="{{route('user.document',$entry['id'])}}" type="text/plain"  class="let">
            <a href="{{route('user.document',$entry['id'])}}"></a>
        </object><br><br>
        <div class="rightContainer" style="height: 53%">
            <button class="btn info" onclick="hideF(this)">Information</button>
            <div class="hideBut">
                <p>Name: {{$entry['name']}}</p>
                <p>Location: {{$entry['location']}}</p>
                <p>Emission date: {{$entry['emission_date']}}</p>
            </div>
        </div>

    </div>
@endforeach