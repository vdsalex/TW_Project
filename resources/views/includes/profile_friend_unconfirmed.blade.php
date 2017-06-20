@foreach ($unconfirmedFriends as $unconfirmedFriend)
<form class="friendUnconfirmed" method="post" action="{{route('friend.remove')}}" onmouseover="displayRemove(this.firstElementChild)" onmouseout="hideRemove(this.firstElementChild)">
    <button type="submit" class="glyphicon glyphicon-remove removeIcon"></button>
    <input type="hidden" value="{{ Session::token() }}" name="_token">
    <input type="hidden" value="{{ $unconfirmedFriend->username }}" name="username">
    <img src="{{url('userimage/' . $unconfirmedFriend['id'] . '/'. $unconfirmedFriend['username'])}}" alt="Member's Photo" class="friendsPhoto">
    <p class="memName">{{$unconfirmedFriend->first_name . ' ' .$unconfirmedFriend ->last_name}}</p>
    <p class='memName' style='font-style: italic'>Request Sent</p>
</form>
@endforeach