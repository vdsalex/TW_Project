var span;
var modals = document.getElementsByClassName('modal');
var memberWantedToBeRemoved;

function displayModalWithOpts(plusSpan)
{
    document.getElementById("main-nav").style.zIndex = "-1";

    var id = plusSpan.getAttribute("id");
    var index = id.substring(id.length - 1, id.length);
    var radioButtons = document.getElementsByName(index + "DgOpts");

    displayModal(plusSpan);
    displayDefaultPhotoAndSetMaxLength(radioButtons[0]);
}

function displayModal(plusSpan)
{
    var spanID = plusSpan.parentElement.firstElementChild.getAttribute("id");

    //Display modal according to the plus span pushed.
    switch(spanID)
    {
        case "1stDegree": modals[1].style.display = "block"; break; //modals[0] is the modal for pf photo
        case "2ndDegree": modals[2].style.display = "block"; break;
        case "3rdDegree": modals[3].style.display = "block"; break;
        case "4thDegree": modals[4].style.display = "block"; break;
        case "5Friends": modals[5].style.display = "block"; break;
    }
}

function displayDefaultPhotoAndSetMaxLength(rdInput)
{
    var index = rdInput.name.substring(0, 1);
    var photo = document.getElementById("photoImg" + index);
    var textField = document.getElementById("nameTextfield" + index);


    //Insert default photo according to rdInput's value (the checked radio button).
    switch(rdInput.value) {
        case "Mother": {
            photo.setAttribute("src", "icons/mother_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Father": {
            photo.setAttribute("src", "icons/father_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Son": {
            photo.setAttribute("src", "icons/son_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Daughter": {
            photo.setAttribute("src", "icons/daughter_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Grandfather": {
            photo.setAttribute("src", "icons/grandfather_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Grandmother": {
            photo.setAttribute("src", "icons/grandmother_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Brother": {
            photo.setAttribute("src", "icons/brother_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Sister": {
            photo.setAttribute("src", "icons/sister_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Aunt": {
            photo.setAttribute("src", "icons/aunt_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Uncle": {
            photo.setAttribute("src", "icons/uncle_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Grandson": {
            photo.setAttribute("src", "icons/grandson_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Granddaughter": {
            photo.setAttribute("src", "icons/granddaughter_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Great Grandson": {
            photo.setAttribute("src", "icons/grandson_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Great Granddaughter": {
            photo.setAttribute("src", "icons/granddaughter_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Nephew": {
            photo.setAttribute("src", "icons/nephew_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Niece": {
            photo.setAttribute("src", "icons/niece_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Great Grandmother": {
            photo.setAttribute("src", "icons/grandmother_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Great Grandfather": {
            photo.setAttribute("src", "icons/grandfather_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Great-Great Grandson": {
            photo.setAttribute("src", "icons/grandson_icon.png");
            textField.setAttribute("maxlength", "29");
        }
            break;
        case "Great-Great Granddaughter": {
            photo.setAttribute("src", "icons/granddaughter_icon.png");
            textField.setAttribute("maxlength", "29");
        }
            break;
        case "Cousin sister": {
            photo.setAttribute("src", "icons/cousin_sister_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Cousin brother": {
            photo.setAttribute("src", "icons/cousin_brother_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Great Nephew": {
            photo.setAttribute("src", "icons/nephew_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Great Niece": {
            photo.setAttribute("src", "icons/niece_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Great Uncle": {
            photo.setAttribute("src", "icons/uncle_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Great Aunt": {
            photo.setAttribute("src", "icons/aunt_icon.png");
            textField.setAttribute("maxlength", "25");
        }
            break;
        case "Great-Great Grandfather": {
            photo.setAttribute("src", "icons/grandfather_icon.png");
            textField.setAttribute("maxlength", "30");
        }
            break;
        case "Great-Great Grandmother": {
            photo.setAttribute("src", "icons/grandmother_icon.png");
            textField.setAttribute("maxlength", "30");
        }
            break;
    }
}

function createMember(cBtn)
{
    var newMember = document.createElement("DIV");

    var id = cBtn.parentElement.getAttribute("id");
    var index = id.substring(id.length - 1, id.length);
    var plusSpan = document.getElementById("plusSpan" + index);
    var photoSrc;
    var nameTextfieldValue = document.getElementById("nameTextfield" + index).value;
    var birthYearValue;
    var deathYearValue;
    var radioButtonCheckedValue;

    if(parseInt(index) === 5)
    {
        newMember.className = "friendUnconfirmed";
        newMember.style.width = "290px";

        plusSpan.parentElement.style.width = String(plusSpan.parentElement.offsetWidth + 300) + "px";

        newMember.innerHTML = "<img src=\"" + photoSrc + "\" alt=\"Member\'s Photo\" class=\"friendsPhoto\"><p class=\"memName\">" + nameTextfieldValue + "</p><p class='memName' style='font-style: italic'>Request Sent</p>";
    }
    else
    {
        newMember.className = "member";
        plusSpan.parentElement.style.width = String(plusSpan.parentElement.offsetWidth + 350) + "px";
        photoSrc = document.getElementById("photoImg" + index).getAttribute("src");

        birthYearValue = document.getElementById("birthYear" + index).value;
        deathYearValue = document.getElementById("deathYear" + index).value;

        radioButtonCheckedValue = getCheckedValue(document.getElementsByName(index + "DgOpts"));

        if(deathYearValue === "")newMember.innerHTML = "<img src=\"" + photoSrc + "\" alt=\"Member\'s Photo\" class=\"membersPhoto\"><p class=\"memName\">"+ radioButtonCheckedValue + " " + nameTextfieldValue + "</p> <p class=\"lived\">" + birthYearValue + "</p>";
        else newMember.innerHTML = "<img src=\"" + photoSrc + "\" alt=\"Member\'s Photo\" class=\"membersPhoto\"><p class=\"memName\">"+ radioButtonCheckedValue + " " + nameTextfieldValue + "</p> <p class=\"lived\">" + birthYearValue + " - " + deathYearValue + "</p>";
    }



    setNewMembersPosition(newMember, plusSpan);
    setNameFontSize(newMember.firstElementChild.nextElementSibling, radioButtonCheckedValue);

    closeModal(document.getElementById("modal" + index));
}

function setNameFontSize(newMember, checkedValue)
{
    switch(checkedValue)
    {
        case "Great Granddaughter":
            newMember.style.fontSize = "11pt";
            break;
        case "Great Grandson":
            newMember.style.fontSize = "11pt";
            break;
        case "Great Grandmother":
            newMember.style.fontSize = "11pt";
            break;
        case "Great Grandfather":
            newMember.style.fontSize = "11pt";
            break;
        case "Great-Great Grandson":
            newMember.style.fontSize = "10pt";
            break;
        case "Great-Great Granddaughter":
            newMember.style.fontSize = "10pt";
            break;
        case "Great-Great Grandmother":
            newMember.style.fontSize = "10pt";
            break;
        case "Great-Great Grandfather":
            newMember.style.fontSize = "10pt";
            break;
    }
}

function setNewMembersPosition(newMember, plusSpan)
{
    var spanID;

    if(plusSpan.parentElement.getAttribute("id") === "requestsSentDiv")
    {
        spanID = "requestsSent";
    }
    else spanID = plusSpan.parentElement.firstElementChild.getAttribute("id");

    switch(spanID)
    {
        case "1stDegree": newMember.style.top = "250px"; break;
        case "2ndDegree": newMember.style.top = "330px"; break;
        case "3rdDegree": newMember.style.top = "410px"; break;
        case "4thDegree": newMember.style.top = "490px"; break;
    }

    //Set distance between elements of class member.
    //There's a special case for the first element.
    if(newMember.previousElementSibling.tagName === "SPAN")
    {
        if(newMember.style.width !== "290px")newMember.style.left = "240px";
        else newMember.style.left = "270px";
    }
    else
    {
        if(spanID !== "requestsSent")newMember.style.left = String(parseInt(newMember.previousElementSibling.style.left) + 350) + "px";
        else newMember.style.left = String(parseInt(newMember.previousElementSibling.style.left) + 300) + "px";
    }
}

function getCheckedValue(rdBtns)
{
    var i;

    for(i = 0; i < rdBtns.length; i++)
    {
        if(rdBtns[i].checked)
        {
            return rdBtns[i].value;
        }
    }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event)
{
    closeModal(event.target);
};

function closeModal(modal)
{
    if(modal.className === "modal")
    {
        if(modal.getAttribute("id") === "modal6")
        {
            modal.style.display = "none";
            return false;
        }

        //get memOptionContent element. Then get its index (last char, a digit).
        var id = modal.firstElementChild.getAttribute("id");
        var index = id.substring(id.length - 1, id.length);

        var nameTextfield = document.getElementById("nameTextfield" + index);
        nameTextfield.value = "";

        //set dgContainer's first input element to true.
        //I used the digit to get the dgContainer.
        if(parseInt(index) !== 5)
        {
            document.getElementById("dgContainer" + index).firstElementChild.firstElementChild.checked = true;

            var birthYearValue = document.getElementById("birthYear" + index);
            var deathYearValue = document.getElementById("deathYear" + index);

            birthYearValue.value = "";
            deathYearValue.value = "";
        }

        modal.style.display = "none";

        document.getElementById("main-nav").style.zIndex = "1";
    }

    return false;
}

function setInput1Max(input2)
{
    var input1 = input2.parentElement.previousElementSibling.previousElementSibling.firstElementChild;

    input1.setAttribute("max", input2.value);
}

function displayRemove(btn)
{
    btn.setAttribute("style", "display: inline !important;");
}

function hideRemove(btn)
{
    btn.setAttribute("style", "display: none !important;");
}


function removeMember(modal)
{
    var relDegree = memberWantedToBeRemoved.parentElement;
    var members = relDegree.children;
    var i, j, subtractor;

    if(memberWantedToBeRemoved.style.width === "290px")
    {
        subtractor = 300;
    }
    else subtractor = 350;

    for(i = 1; i < members.length - 1; i++)
    {
        if(members[i] === memberWantedToBeRemoved)
        {
            //move every element one position left.
            for(j = i + 1; j < members.length - 1; j++)
            {
                members[j].style.left = String(parseInt(members[j].style.left) - subtractor) + "px";
            }

            break;
        }
    }

    relDegree.removeChild(memberWantedToBeRemoved);
    relDegree.style.width = String(parseInt(relDegree.style.width) - subtractor) + "px";

    closeModal(modal);

    return false;
}

function moveToFriends(request)
{
    var friendsDiv = document.getElementById("friendsDiv");
    var username = request.firstElementChild.nextElementSibling.firstElementChild.innerHTML;
    var newFriend = document.createElement("DIV");

    friendsDiv.style.width = String(parseInt(friendsDiv.offsetWidth) + 300) + "px";

    newFriend.className = "friendAccepted";
    newFriend.style.position = "absolute";
    newFriend.style.width = "290px";
    newFriend.style.top = "535px";

    if(friendsDiv.children.length > 2)
    {
        newFriend.style.left = String(parseInt(friendsDiv.lastElementChild.previousElementSibling.style.left) + 300) + "px";
    }
    else newFriend.style.left = "240px";

    newFriend.innerHTML = "<img src='' alt=\"Member\'s Photo\" class=\"friendsPhoto\"><p class=\"memName\">" + username + "</p>";

    friendsDiv.insertBefore(newFriend, friendsDiv.lastElementChild.nextElementSibling);

    request.parentElement.removeChild(request);
}

function deleteRequest(request)
{
    request.parentElement.removeChild(request);
}

var requestsSent = document.getElementsByClassName("friendUnconfirmed");
var i;
var parentDiv = document.getElementById("requestsSentDiv");

if(requestsSent.length !== 0)
{
    parentDiv.style.width = String(parseInt(parentDiv.offsetWidth) + 300) + "px";
    requestsSent[0].style.left = "270px";

    for(i = 1; i < requestsSent.length; i++)
    {
        parentDiv.style.width = String(parseInt(parentDiv.style.width) + 300) + "px";
        requestsSent[i].style.left = String(parseInt(requestsSent[i-1].style.left) + 300) + "px";
    }
}