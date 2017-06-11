@foreach($entries as $entry)
    <div class="jumbotron">
        <div class="profile-photo">
            <a href="./profile/profile.html"><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p  align="left"><a href="content/profile.html"> &nbsp; FirstName LastName (nu ar trebui aici) </a> added a photo.</p>
        <p class="buttons_paragraph">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-1">Upload date</button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-2">Description:  {{$entry['name']}}</button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-3">Location: {{$entry['location']}} </button>
        </p>
        <img src="{{$entry['URL']}}" alt="Photo" class="img-rounded">
    </div>

@endforeach