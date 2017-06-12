@foreach($entries as $entry)
    <div class="jumbotron ">
    <div class="profile-photo">
        <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
    </div>
    <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a document.</p>
    <object data="content/document.txt" type="text/plain" style="height: 50%; width:50%" class="let">
        <a href="content/document.txt"></a>
    </object>

    </div>
@endforeach