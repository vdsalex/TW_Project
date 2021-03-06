@foreach($entries as $entry)
    <div id="modal_id" class="modal">

        <span class="close" onclick="document.getElementById('modal_id').style.display='none'">&times;</span>
        <img class="modal-content" id="img2">
        <div id="caption2"></div>
    </div>
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="{{url('userimage/' . $entry['user_id'] . '/'. $entry['username'])}}"
                                                           alt="Profile Photo" width=70" height="66" ></a>
            </div>
            <p  align="left"><a href=http://localhost:8000/profile> &nbsp;{{$entry['first_name'] . ' ' . $entry['last_name']}} </a> added a photo.</p>
        </div>

        <img  src={{route('user.photo',$entry['id'])}} alt="{{$entry['id']}}" class="img-rounded"><br><br>
        <div class="rightContainer">
            <button class="btn info" onclick="hideF(this)">Information</button>
            <div class="hideBut">
                <p class="memAttribute">Description: &nbsp</p><p class="memDescription">{{$entry['description']}}</p><br><br>
                <p class="memAttribute">Location: &nbsp</p><p class="memLocation">{{$entry['location']}}</p><br><br>
                <p class="memAttribute">Creation date: &nbsp</p><p class="memCreationDate">{{$entry['snap_date']}}</p>
            </div>
        </div>
    </div>
@endforeach