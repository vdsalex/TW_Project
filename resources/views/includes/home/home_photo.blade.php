@foreach($entries as $entry)
    <div id="modal_id" class="modal">

        <span class="close" onclick="document.getElementById('modal_id').style.display='none'">&times;</span>
        <img class="modal-content" id="img2">
        <div id="caption2"></div>
    </div>
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="{{route('account.image',['userId'=>$entry['user_id'],'username'=>$entry['username']])}}"
                                                           alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p  align="left"><a href=http://localhost:8000/profile> &nbsp;{{$entry['first_name'] . ' ' . $entry['last_name']}} </a> added a photo.</p>
        </div>

        <img  src={{route('user.photo',$entry['id'])}} alt="{{$entry['id']}}" class="img-rounded"><br><br>
        <div class="rightContainer" style="height: 53%;">
            <button class="btn info" onclick="hideF(this)">Information</button>
            <div class="hideBut">
                <p>Description: {{$entry['description']}}</p>
                <p>Location: {{$entry['location']}}</p>
                <p>Creation date: {{$entry['snap_date']}}</p>
            </div>
        </div>
    </div>
@endforeach