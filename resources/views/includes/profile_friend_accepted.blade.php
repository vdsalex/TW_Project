@foreach ($acceptedFriends as $acceptedFriend)
<form action="{{route('friend.remove')}}" method="post" class="friendAccepted" onmouseover="displayRemove(this.firstElementChild)" onmouseout="hideRemove(this.firstElementChild)">
    <button type="submit" class="glyphicon glyphicon-remove removeIcon"></button>
    <input type="hidden" value="{{ Session::token() }}" name="_token">
    <input type="hidden" value="{{ $acceptedFriend->username }}" name="username">
    <img src="{{route('account.image',['userId'=>$acceptedFriend->id,'username'=>$acceptedFriend->username])}}" alt="Member's Photo" class="friendsPhoto">
    <p class="memName">{{$acceptedFriend->first_name . ' ' .$acceptedFriend ->last_name}}</p>
</form>
@endforeach