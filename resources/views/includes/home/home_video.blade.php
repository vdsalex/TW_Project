@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="{{url('userimage/' . $entry['user_id'] . '/'. $entry['username'])}}"
                                                           alt="Profile Photo" width=70" height="66" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp; {{$entry['first_name'] . ' ' . $entry['last_name']}} </a> added a movie.</p>
        </div>
        <video class="video" controls>
            <source src="{{route('user.video',$entry['id'])}}"  type="video/mp4" >
        </video><br><br>
        <div class="rightContainer">
            <button class="btn info" onclick="hideF(this)">Information</button>
            <div class="hideBut">
                <p class="memAttribute">Title: &nbsp</p><p class="memLocation">{{$entry['title']}}</p><br><br>
                <p class="memAttribute">Description: &nbsp</p><p class="memDescription">{{$entry['description']}}</p><br><br>
                <p class="memAttribute">Record date: &nbsp</p><p class="memCreationDate">{{$entry['record_date']}}</p>
            </div>
        </div>
    </div>
@endforeach