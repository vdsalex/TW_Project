@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href="{{route('profile')}}"><img src="{{  url('userimage/' . Auth::user()->id . '/'. Auth::user()->username) }}" alt="Profile Photo" width=70" height="66" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp; You </a> added a movie.</p>
            <button class="btn btn-default deleteBtn">Delete This Memory</button>

            <form action="{{route('delete.video',['id'=>$entry['id']])}}" method="post">
                <button type="submit" class="btn btn-default deleteBtn">Delete This Memory</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>


        <video class="video" controls>
            <source src="{{route('user.video',$entry['id'])}}"  type="video/mp4" >
        </video><br><br>
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