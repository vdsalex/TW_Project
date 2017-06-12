@foreach($entries as $entry)
    <div class="jumbotron ">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a movie.</p>

        <video class="video" controls>
            <source src="content/AmazingFacts.mp4" type="video/mp4" alt="Video" >
        </video>
    </div>
@endforeach