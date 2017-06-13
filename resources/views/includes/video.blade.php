@foreach($entries as $entry)
    <div class="jumbotron ">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a movie.</p>

        <video class="video" controls>
            <source src="content/AmazingFacts.mp4" type="video/mp4" alt="Video" >
        </video><br><br>
        <div class="tab">
            <button class="tablinks" onclick="openCol(event, 'Title')">Title</button>
            <button class="tablinks" onclick="openCol(event, 'Description')">Description</button>
            <button class="tablinks" onclick="openCol(event, 'Record Date')">Record Date</button>
        </div>
        <div id="Title" class="tabcontent">
            <h3>Title</h3>
            <p>Title is the capital city of England.</p>
        </div>

        <div id="Description" class="tabcontent">
            <h3>Description</h3>
            <p>Description is the capital of France.</p>
        </div>

        <div id="Record Date" class="tabcontent">
            <h3>Record Date</h3>
            <p>Record Date< is the capital of Japan.</p>
        </div>
    </div>
@endforeach