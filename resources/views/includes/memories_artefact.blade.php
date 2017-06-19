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
                <a href="{{route('profile')}}"><img src="{{route('account.image',['userId'=>Auth::user()->id,'username'=>Auth::user()->username])}}" alt="Profile Photo" width=70" height="66" ></a>
            </div>
            <p align="left"><a href=http://localhost:8000/profile> &nbsp; You </a> added an artefact.</p>
            <form action="{{route('delete.artefact',['id'=>$entry['id']])}}" method="post">
                <button type="submit" class="btn btn-default deleteBtn">Delete This Memory</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        <img src="{{route('user.artefact',$entry['id'])}}" alt="Photo" class="img-rounded"><br><br>
        <div class="btnsContainerz">
            <button class="btn info" onclick="hideF(this)">Description</button>
            <button class="btn info" onclick="hideF(this)">Location</button>
            <button class="btn info" onclick="hideF(this)">Receiving Date</button>
        </div>

    </div>
@endforeach