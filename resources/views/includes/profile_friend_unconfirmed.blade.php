@foreach ($unconfirmedFriends as $unconfirmedFriend)
<div class="friendUnconfirmed" onmouseover="displayRemove(this)" onmouseout="hideRemove(this)">
    <img src="{{route('account.image',['userId'=>$unconfirmedFriend->id,'username'=>$unconfirmedFriend->username])}}" alt="Member's Photo" class="friendsPhoto">
    <p class="memName">{{$unconfirmedFriend->first_name . ' ' .$unconfirmedFriend ->last_name}}</p>
    <p class='memName' style='font-style: italic'>Request Sent</p>
</div>
@endforeach