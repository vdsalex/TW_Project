var i;
var parentDiv = document.getElementById("friendsDiv");
var acceptedFriends = document.getElementsByClassName("friendAccepted");

if(acceptedFriends.length !== 0)
{
    parentDiv.style.width = String(parseInt(parentDiv.offsetWidth) + 250) + "px";
    acceptedFriends[0].style.left = "240px";

    for(i = 1; i < requestsSent.length; i++)
    {
        parentDiv.style.width = String(parseInt(parentDiv.offsetWidth) + 300) + "px";
        acceptedFriends[i].style.left = String(parseInt(acceptedFriends[i-1].style.left) + 300) + "px";
    }
}