@foreach($entries as $entry)
    <div class="jumbotron">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p  align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a photo.</p>
        <img  src="content/fat-frumos.jpg" alt="Photo" class="img-rounded">

    </div>
@endforeach