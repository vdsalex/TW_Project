@foreach($entries as $entry)
    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a movie.</p>
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