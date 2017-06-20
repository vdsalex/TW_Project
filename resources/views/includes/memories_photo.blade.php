@foreach($entries as $entry)
    <div id="modal_id" class="modal">

        <span class="close" onclick="document.getElementById('modal_id').style.display='none'">&times;</span>
        <img class="modal-content" id="img2">
        <div id="caption2"></div>
    </div>
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href="{{route('profile')}}"><img src="{{ url('userimage/' . Auth::user()->id . '/'. Auth::user()->username) }}" alt="Profile Photo" width=70" height="66" ></a>
            </div>
            <p  align="left"><a href=http://localhost:8000/profile> &nbsp; You </a> added a photo.</p>

            <form action="{{route('delete.photo',['id'=>$entry['id']])}}" method="post">
                <button type="submit" class="btn btn-default deleteBtn">Delete This Memory</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
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