@foreach ($receivedFriends as $receivedFriend)
    <div class="request">
        <img src="{{route('account.image',['userId'=>$receivedFriend->id,'username'=>$receivedFriend->username])}}" alt="Requester's Photo" class="requesterPhoto">
        <div class="requestDiv">
            <p class="requesterName">{{$receivedFriend->first_name . ' ' .$receivedFriend ->last_name}}</p>
            <p class="requestMessage"> sent you a request.</p>
        </div>
        <div class="responseBtns">
            <form method="post" action="{{route('friend.accept')}}">
                <input type="hidden" value="{{ Session::token() }}" name="_token">
                <input type="hidden" value="{{ $receivedFriend->username }}" name="username">
                <button type="submit" class="btn btn-default">Accept</button>
            </form>
            <form method="post" action="{{route('friend.deny')}}">
                <button type="submit" class="btn btn-default">Reject</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
                <input type="hidden" value="{{ $receivedFriend->username }}" name="username">
            </form>
        </div>
    </div>
@endforeach