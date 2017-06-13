@foreach($entries as $entry)
    <div class="jumbotron ">
        <div class="profile-photo">
            <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
        </div>
        <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added a letter.</p>
        <object data="content/scrisoare.txt" type="text/plain" style="height: 50%; width:50%" class="let">
            <a href="content/scrisoare.txt"></a>
        </object><br><br>
        <div class="tab">
            <button class="tablinks" onclick="openCol(event, 'Sender')">Sender</button>
            <button class="tablinks" onclick="openCol(event, 'Receiver')">Receiver</button>
            <button class="tablinks" onclick="openCol(event, 'Message')">Message</button>
            <button class="tablinks" onclick="openCol(event, 'Writing Date')">Writing Date</button>

        </div>
        <div id="Sender" class="tabcontent">
            <h3>Sender</h3>
            <p>Sender is the capital city of England.</p>
        </div>

        <div id="Receiver" class="tabcontent">
            <h3>Receiver</h3>
            <p>Receiver is the capital of France.</p>
        </div>

        <div id="Message" class="tabcontent">
            <h3>Message</h3>
            <p>Message is the capital of Japan.</p>
        </div>

        <div id="Writing Date" class="tabcontent">
            <h3>Writing Date</h3>
            <p>Writing Date is the capital of Japan.</p>
        </div>
    </div>
@endforeach