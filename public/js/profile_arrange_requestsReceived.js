var parentDiv = document.getElementById("requestsReceivedDiv");
var requestsReceived = document.getElementsByClassName("request");
var i;

if(requestsReceived.length !== 0)
{
    parentDiv.style.width = String(parseInt(parentDiv.offsetWidth) + 420) + "px";
    requestsReceived[0].style.left = "310px";

    for(i = 1; i < requestsReceived.length; i++)
    {
        parentDiv.style.width = String(parseInt(parentDiv.offsetWidth) + 420) + "px";
        requestsReceived[i].style.left = String(parseInt(requestsReceived[i-1].style.left) + 420) + "px";
    }
}