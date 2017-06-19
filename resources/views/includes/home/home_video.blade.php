@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="{{route('account.image',['userId'=>$entry['user_id'],'username'=>$entry['username']])}}"
                                                           alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp; {{$entry['first_name'] . ' ' . $entry['last_name']}} </a> added a movie.</p>
        </div>


        <video class="video" controls>
            <source src="{{route('user.video',$entry['id'])}}"  type="video/mp4" >
        </video><br><br>

        <div class="rightContainer" style="height: 43%">
            <button class="btn info" onclick="hideF(this)">Information</button>
            <div class="hideBut">
                <p>Title: {{$entry['title']}}</p>
                <p>Description: {{$entry['description']}}</p>
                <p>Record date: {{$entry['record_date']}}</p>
            </div>
        </div>
    </div>
@endforeach