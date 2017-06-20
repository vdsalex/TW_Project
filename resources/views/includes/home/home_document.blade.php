@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="{{route('account.image',['userId'=>$entry['user_id'],'username'=>$entry['username']])}}"
                                                           alt="Profile Photo" width=70" height="66" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp;{{$entry['first_name'] . ' ' . $entry['last_name']}} </a> added a document.</p>
        </div>
        <object data="{{route('user.document',$entry['id'])}}" type="text/plain"  class="let">
            <a href="{{route('user.document',$entry['id'])}}"></a>
        </object><br><br>
        <div class="rightContainer" style="height: 53%">
            <button class="btn info" onclick="hideF(this)">Information</button>
            <div class="hideBut">
                <p class="memAttribute">Name: &nbsp</p><p class="memLocation">{{$entry['name']}}</p>
                <p class="memAttribute">Location: &nbsp</p><p class="memDescription">{{$entry['location']}}</p>
                <p class="memAttribute">Emission date: &nbsp</p><p class="memCreationDate">{{$entry['emission_date']}}</p>
            </div>
        </div>

    </div>
@endforeach