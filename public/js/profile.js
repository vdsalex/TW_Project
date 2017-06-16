var relDegree;
var btnPressed = [0, 0, 0, 0];
var span;
var members;
var i;
var relDegreeWidth;
var modals = document.getElementsByClassName('modal');
var id;
var index;
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

function displayModalWithOpts(plusSpan)
{
    document.getElementById("main-nav").style.zIndex = "-1";

    var id = plusSpan.getAttribute("id");
    var index = id.substring(id.length - 1, id.length);
    var radioButtons = document.getElementsByName(index + "DgOpts");

    displayModal(plusSpan);
    displayDefaultPhoto(radioButtons[0]);
}

function createMember(cBtn)
{
    var newMember = document.createElement("DIV");
    newMember.className = "member";

    var id = cBtn.parentElement.getAttribute("id");
    var index = id.substring(id.length - 1, id.length);
    var plusSpan = document.getElementById("plusSpan" + index);

    plusSpan.parentElement.style.width = String(plusSpan.parentElement.offsetWidth + 350) + "px";

    var photoSrc = document.getElementById("photoImg" + index).getAttribute("src");
    var nameTextfieldValue = document.getElementById("nameTextfield" + index).value;
    var birthYearValue = document.getElementById("birthYear" + index).value;
    var deathYearValue = document.getElementById("deathYear" + index).value;
    var radioButtonCheckedValue = getCheckedValue(document.getElementsByName(index + "DgOpts"));

    if(deathYearValue === "")newMember.innerHTML = "<img src=\"" + photoSrc + "\" alt=\"Member\'s Photo\" class=\"membersPhoto\"><p class=\"memName\">"+ radioButtonCheckedValue + " " + nameTextfieldValue + "</p> <p class=\"lived\">" + birthYearValue + "</p>";
    else newMember.innerHTML = "<img src=\"" + photoSrc + "\" alt=\"Member\'s Photo\" class=\"membersPhoto\"><p class=\"memName\">"+ radioButtonCheckedValue + " " + nameTextfieldValue + "</p> <p class=\"lived\">" + birthYearValue + " - " + deathYearValue + "</p>";

    plusSpan.parentElement.insertBefore(newMember, plusSpan);

    setNewMembersPosition(newMember, plusSpan);

    closeModal(document.getElementById("modal" + index));

    return false;
}

function setNewMembersPosition(newMember, plusSpan)
{
    switch(plusSpan.parentElement.firstElementChild.textContent)
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

function displayModal(plusSpan)
{
    //Display modal according to the plus span pushed.
    switch(plusSpan.parentElement.firstElementChild.textContent)
    {
        case "1st Degree": modals[1].style.display = "block"; break; //modals[0] is the modal for pf photo
        case "2nd Degree": modals[2].style.display = "block"; break;
        case "3rd Degree": modals[3].style.display = "block"; break;
        case "4th Degree": modals[4].style.display = "block"; break;
    }
}

function displayDefaultPhoto(rdInput)
{
    var photo = document.getElementById("photoImg" + rdInput.name.substring(0, 1));

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
        case "Great Grandson":
            photo.setAttribute("src", "icons/grandson_icon.png");
            break;
        case "Great Granddaughter":
            photo.setAttribute("src", "icons/granddaughter_icon.png");
            break;
        case "Nephew":
            photo.setAttribute("src", "icons/nephew_icon.png");
            break;
        case "Niece":
            photo.setAttribute("src", "icons/niece_icon.png");
            break;
        case "Great Grandmother":
            photo.setAttribute("src", "icons/grandmother_icon.png");
            break;
        case "Great Grandfather":
            photo.setAttribute("src", "icons/grandfather_icon.png");
            break;
        case "Great-Great Grandson":
            photo.setAttribute("src", "icons/grandson_icon.png");
            break;
        case "Great-Great Granddaughter":
            photo.setAttribute("src", "icons/granddaughter_icon.png");
            break;
        case "Cousin sister":
            photo.setAttribute("src", "icons/cousin_sister_icon.png");
            break;
        case "Cousin brother":
            photo.setAttribute("src", "icons/cousin_brother_icon.png");
            break;
        case "Great Nephew":
            photo.setAttribute("src", "icons/nephew_icon.png");
            break;
        case "Great Niece":
            photo.setAttribute("src", "icons/niece_icon.png");
            break;
        case "Great Uncle":
            photo.setAttribute("src", "icons/uncle_icon.png");
            break;
        case "Great Aunt":
            photo.setAttribute("src", "icons/aunt_icon.png");
            break;
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
        //get memOptionContent element. Then get its index (last char, a digit).
        id = modal.firstElementChild.getAttribute("id");
        index = id.substring(id.length - 1, id.length);

        //set dgContainer's first input element to true.
        //I used the digit to get the dgContainer.
        document.getElementById("dgContainer" + index).firstElementChild.firstElementChild.checked = true;

        nameTextfield = document.getElementById("nameContainer" + index).firstElementChild.firstElementChild;
        nameTextfield.value = "";

        var birthYearValue = document.getElementById("birthYear" + index);
        var deathYearValue = document.getElementById("deathYear" + index);

        birthYearValue.value = "";
        deathYearValue.value = "";

        modal.style.display = "none";

        document.getElementById("main-nav").style.zIndex = "1";
    }
}

function setInput1Max(input2)
{
    var input1 = input2.parentElement.previousElementSibling.previousElementSibling.firstElementChild;

    input1.setAttribute("max", input2.value);
}

