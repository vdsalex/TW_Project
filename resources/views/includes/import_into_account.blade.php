@foreach($entries as $entry)

    <div class="jumbotron">
    <div class="profile-photo">
        <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
    </div>
    <p  align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a photo.
    </p>

    <input type="button" class="button" value="Import into account" style="background-color: #4CAF52;
                color: white; padding: 15px 32px; text-align: center;font-size: 16px;margin: 4px 2px;cursor: pointer; float: right;padding-top: 5px !important;">
    <img  src="content/fat-frumos.jpg" alt="Photo" class="img-rounded">

    </div>
@endforeach