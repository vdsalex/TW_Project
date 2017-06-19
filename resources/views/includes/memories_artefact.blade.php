{!! Html::style('css/home.css') !!}
@foreach($entries as $entry)
    <div id="modal_id" class="modal">

        <span class="close" onclick="document.getElementById('modal_id').style.display='none'">&times;</span>

        <img class="modal-content" id="img2">

        <div id="caption2"></div>
    </div>

    <div class="jumbotron" style="margin-top: 80px !important;">
        <div class="poster">
            <div class="profile-photo">
                <a href=http://localhost:8000/profile><img src="content/fat-frumos.jpg" alt="Profile Photo" width=50" height="46" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp; FirstName LastName </a> added an artefact.</p>
            <form action="{{route('delete.artefact',['id'=>$entry['id']])}}" method="post">
                <button type="submit" class="btn btn-default deleteBtn">Delete This Memory</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        <img src="{{route('user.artefact',$entry['id'])}}" alt="Photo" class="img-rounded"><br><br>
        <div class="rightContainer" style="height: 53%;">
            <button class="btn info" onclick="hideF(this)">Information</button>
            <div class="hideBut">
                <p>Name: {{$entry['name']}}</p>
                <p>Description: {{$entry['description']}}</p>
                <p>Receiving date: {{$entry['receive_date']}}</p>
            </div>
        </div>

    </div>
@endforeach