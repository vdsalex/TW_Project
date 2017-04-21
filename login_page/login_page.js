function openTab(buttonId, button, tabcontentId)
{
	var i, tabcontent, tablinks;
	var theOtherButton;
	var loginBox;
	var description;

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
	loginBox = document.getElementById("loginBox");
	//description = document.getElementById("description");


	if(buttonId.localeCompare("loginButton") == 0)
	{
		theOtherButton = document.getElementById("signUpButton");
		theOtherButton.style.boxShadow = "inset 3px -3px 5px 0 MidnightBlue";

		loginBox.style.height = "300px";
		//description.style.top = "22.1%";
	}
	else
	{
		theOtherButton = document.getElementById("loginButton");
		theOtherButton.style.boxShadow = "inset -3px -3px 5px 0 MidnightBlue";

		loginBox.style.height = "330px";
		//description.style.top = "19.6%";
	}

	button.style.color = "rgb(26, 18, 142)";
	button.style.backgroundColor = "Transparent";

	document.getElementById(tabcontentId).style.display = "block";
}

document.getElementById("loginButton").click();