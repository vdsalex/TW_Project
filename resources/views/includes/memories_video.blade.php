@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href="{{route('profile')}}"><img src="{{route('account.image',['userId'=>Auth::user()->id,'username'=>Auth::user()->username])}}" alt="Profile Photo" width=70" height="66" ></a>
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

        <div class="btnsContainerz">
            <button class="btn info" onclick="hideF(this)">Description</button>
            <button class="btn info" onclick="hideF(this)">Location</button>
            <button class="btn info" onclick="hideF(this)">Receiving Date</button>
        </div>
    </div>
@endforeach