@foreach ($acceptedFriends as $acceptedFriend)
<div class="friendAccepted" onmouseover="displayRemove(this)" onmouseout="hideRemove(this)">
    <img src="{{route('account.image',['userId'=>$acceptedFriend->id,'username'=>$acceptedFriend->username])}}" alt="Member's Photo" class="friendsPhoto">
    <p class="memName">{{$acceptedFriend->first_name . ' ' .$acceptedFriend ->last_name}}</p>
</div>
@endforeach