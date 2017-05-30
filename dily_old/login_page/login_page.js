function openTab(buttonId, button, tabcontentId)
{
    if(currentButton === buttonId)return;

	var i, tabcontent, tablinks;
	var theOtherButton;

	tabcontent = document.getElementsByClassName("tabcontent");

	// Hide the two elements with class="tabcontent" by default */
	for(i = 0; i < tabcontent.length; i++)
	{
		tabcontent[i].style.display = "none";
	}

	tablinks = document.getElementsByClassName("tablink");

	// Remove the background color of all tablinks/buttons
	for(i = 0; i < tablinks.length; i++)
	{
		tablinks[i].style.backgroundColor = "";
		tablinks[i].style.color = "";
		tablinks[i].style.textShadow = "";
		tablinks[i].style.boxShadow = "none";
	}

	button.style.boxShadow = "1px 1px 2px 1px MidnightBlue";

	if(buttonId.localeCompare("loginButton") === 0)
	{
		theOtherButton = document.getElementById("signUpButton");
		theOtherButton.style.boxShadow = "inset 3px -3px 5px 0 MidnightBlue";

        if(!first)
        {
            if(window.screen.width <= 444)loginBox.style.height = String(loginBox.offsetHeight - 130) + "px";
            else loginBox.style.height = String(loginBox.offsetHeight - 30) + "px";
        }
        else first = false;
	}
	else
	{
		theOtherButton = document.getElementById("loginButton");
		theOtherButton.style.boxShadow = "inset -3px -3px 5px 0 MidnightBlue";

		if(window.screen.width <= 444)loginBox.style.height = String(loginBox.offsetHeight + 130) + "px";
		else loginBox.style.height = String(loginBox.offsetHeight + 30) + "px";
	}

	button.style.color = "rgb(26, 18, 142)";
	button.style.backgroundColor = "Transparent";

	document.getElementById(tabcontentId).style.display = "block";

	currentButton = buttonId;
}

//Trebuie setata dimensiunea initiala pentru loginBox atunci cand se iese din modul Inspect
function onResize()
{
    if(window.screen.width >= 660)
    {
        if(currentButton.localeCompare("loginButton") === 0)loginBox.style.height = "300px";
        else loginBox.style.height = "330px";
    }
}

var first = true;
var currentButton = null;
var loginBox = document.getElementById("loginBox");

document.getElementById("loginButton").click();

currentButton = "loginButton";

onResize();