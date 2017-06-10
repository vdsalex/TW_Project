var relDegree;
var btnPressed = [0, 0, 0, 0];
var span;
var members;
var i;
var relDegreeWidth;
var modals = document.getElementsByClassName('modal');
var divPhotoContent;
var memOptionsId;
var memOptionsIndex;
var nameTextfield;

function displayDg(relDegreeBtn)
{
    relDegree = relDegreeBtn.parentElement;
    span = relDegree.lastElementChild;
    members = relDegree.children;

    //Get button index from its name (1st, 2nd..).
    if(btnPressed[parseInt((relDegreeBtn.textContent).substring(0, 1)) - 1] === 0)
    {
        relDegree.style.width = String(relDegree.offsetWidth + 90) + "px";

        for(i = 1; i < members.length - 1; i++)
        {
            relDegreeWidth = parseInt(relDegree.style.width) + 350;
            relDegree.style.width = String(relDegreeWidth) + "px";
            members[i].style.display = "block";
        }

        span.style.display = "inline-block";

        btnPressed[parseInt((relDegreeBtn.textContent).substring(0, 1)) - 1] = 1;
    }
    else
    {
        for(i = 1; i < members.length; i++)
        {
            members[i].style.display = "none";
        }

        relDegree.style.width = "120px";
        span.style.display = "none";

        btnPressed[parseInt((relDegreeBtn.textContent).substring(0, 1)) - 1] = 0;
    }
}

function createMember(plusSpan)
{
    displayMemOptsModal(plusSpan);
    displayDefaultPhoto(document.getElementById("dgContainer" + plusSpan.previousElementSibling.textContent.substring(0, 1)).firstElementChild.firstElementChild);

/*
    aSpan.parentElement.style.width = String(aSpan.parentElement.offsetWidth + 350) + "px";

    var newMember = document.createElement("DIV");
    newMember.className = "member";
    newMember.innerHTML = "<img src=\"icons/grandfather_icon.png\" alt=\"Member\'s Photo\" class=\"membersPhoto\"><p class=\"memName\">Mother Elizabeth</p> <p class=\"lived\">1936 - 2009</p>";
    aSpan.parentElement.insertBefore(newMember, aSpan);

    switch(aSpan.parentElement.firstElementChild.textContent)
    {
        case "1st Degree": newMember.style.top = "170px"; break;
        case "2nd Degree": newMember.style.top = "250px"; break;
        case "3rd Degree": newMember.style.top = "330px"; break;
        case "4th Degree": newMember.style.top = "410px"; break;
    }

    //Set distance between elements of class member.
    //There's a special case for the first element.
    if(newMember.previousElementSibling.tagName === "BUTTON")
    {
        newMember.style.left = "240px";
    }
    else
    {
        newMember.style.left = String(parseInt(newMember.previousElementSibling.style.left) + 350) + "px";
    }*/
}

function displayMemOptsModal(plusSpan)
{
    //Display modal according to the plus span pushed.
    switch(plusSpan.previousElementSibling.textContent)
    {
        case "1st Degree": modals[1].style.display = "block"; break; //modals[0] is the modal for pf photo
        case "2nd Degree": modals[2].style.display = "block"; break;
        case "3rd Degree": modals[3].style.display = "block"; break;
        case "4th Degree": modals[4].style.display = "block"; break;
    }
}

function displayDefaultPhoto(rdInput)
{
    var photo = document.getElementById("photoContainer" + rdInput.name.substring(0, 1)).firstElementChild;

    //Insert default photo according to rdInput's value (the checked radio button).
    switch(rdInput.value)
    {
        case "Mother":
            photo.setAttribute("src", "icons/mother_icon.png");
            break;
        case "Father":
            photo.setAttribute("src", "icons/father_icon.png");
            break;
        case "Son":
            photo.setAttribute("src", "icons/son_icon.png");
            break;
        case "Daughter":
            photo.setAttribute("src", "icons/daughter_icon.png");
            break;
        case "Grandfather":
            photo.setAttribute("src", "icons/grandfather_icon.png");
            break;
        case "Grandmother":
            photo.setAttribute("src", "icons/grandmother_icon.png");
            break;
        case "Brother":
            photo.setAttribute("src", "icons/brother_icon.png");
            break;
        case "Sister":
            photo.setAttribute("src", "icons/sister_icon.png");
            break;
        case "Aunt":
            photo.setAttribute("src", "icons/aunt_icon.png");
            break;
        case "Uncle":
            photo.setAttribute("src", "icons/uncle_icon.png");
            break;
        case "Grandson":
            photo.setAttribute("src", "icons/grandson_icon.png");
            break;
        case "Granddaughter":
            photo.setAttribute("src", "icons/granddaughter_icon.png");
            break;
        case "GtGrandson":
            photo.setAttribute("src", "icons/grandson_icon.png");
            break;
        case "GtGranddaughter":
            photo.setAttribute("src", "icons/granddaughter_icon.png");
            break;
        case "Nephew":
            photo.setAttribute("src", "icons/nephew_icon.png");
            break;
        case "Niece":
            photo.setAttribute("src", "icons/niece_icon.png");
            break;
        case "GtGrandmother":
            photo.setAttribute("src", "icons/grandmother_icon.png");
            break;
        case "GtGrandfather":
            photo.setAttribute("src", "icons/grandfather_icon.png");
            break;
        case "GtGtGrandson":
            photo.setAttribute("src", "icons/grandson_icon.png");
            break;
        case "GtGtGranddaughter":
            photo.setAttribute("src", "icons/granddaughter_icon.png");
            break;
        case "Cousin sister":
            photo.setAttribute("src", "icons/cousin_sister_icon.png");
            break;
        case "Cousin brother":
            photo.setAttribute("src", "icons/cousin_brother_icon.png");
            break;
        case "GtNephew":
            photo.setAttribute("src", "icons/nephew_icon.png");
            break;
        case "GtNiece":
            photo.setAttribute("src", "icons/niece_icon.png");
            break;
        case "GtUncle":
            photo.setAttribute("src", "icons/uncle_icon.png");
            break;
        case "GtAunt":
            photo.setAttribute("src", "icons/aunt_icon.png");
            break;
    }
}

function getUploadedPhoto(pushedButton)
{
    pushedButton.firstElementChild.onchange = function()
    {
        var reader = new FileReader();

        reader.onload = function (e)
        {
            pushedButton.nextElementSibling.firstElementChild.setAttribute("src", e.target.result);
        };

        reader.readAsDataURL();
    };
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event)
{
    if(event.target.className === "modal")
    {
        //get memOptionContent element. Then get its index (last char, a digit).
        memOptionsId = event.target.firstElementChild.getAttribute("id");
        memOptionsIndex = memOptionsId.substring(memOptionsId.length - 1, memOptionsId.length);

        //set dgContainer's first input element to true.
        //I used the digit to get the dgContainer.
        document.getElementById("dgContainer" + memOptionsIndex).firstElementChild.firstElementChild.checked = true;
        nameTextfield = document.getElementById("nameContainer" + memOptionsIndex).firstElementChild.firstElementChild;

        nameTextfield.value = "";

        event.target.style.display = "none";
    }
}
