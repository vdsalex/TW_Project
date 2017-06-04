<?php echo Html::style('css/login.css'); ?>



<!DOCTYPE html>

<html>
<head>
	<title>DiLy</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body onresize="onResize()">
	<img id="bgImg" alt="Blue Background Image" src="content/blue-11.jpg">
	<h1 id="dilyHeader">DiLy.</h1>
	<div id="loginAndDesc">
		<p id="description">Store your sentimental information with DiLy.</p>
		<div id="loginBox">
			<button class="tablink" onclick="openTab('loginButton', this, 'loginTab')" id="loginButton">Login</button>
			<button class="tablink" onclick="openTab('signUpButton', this, 'signUpTab')" id="signUpButton">Sign Up</button>
			<div id="loginTab" class="tabcontent">
				<div id="loginWithPanel">
					<p>Login with:</p>
					<img id="facebookIcon" class="icon" src="icons/facebook_icon.png" alt="Facebook Icon">
					<img id="gmailIcon" class="icon" src="icons/gmail_icon.png" alt="GMail Icon">
				</div>
				<form id="loginForm">
					<ul>
						<li>
							<div id="usernameLoginDiv">
								<img id="userIcon" class="icon" alt="User Icon" src="icons/user_icon.png">
								<input class="loginTextFields" type="text" name="username" placeholder="Username">
							</div>
						</li>
						<li>
							<div id="passwordLoginDiv">
								<img id="passwordIcon" class="icon" alt="Password Icon" src="icons/password_icon.png">
								<input class="loginTextFields" type="password" name="password" placeholder="Password">
							</div>
						</li>
					</ul>
					<div id="remMePasswdLabels">
						<label id="rememberMeLabel">
							<input id="rememberMe" type="checkbox" name="rememberMeCBox" value="remMeValue">Remember Me
						</label>
						<label id="fgtPasswdLabel">
							Forgot Your Password?
						</label>
					</div>
				</form>
				<button id="loginToAccountButton">Login to your Account</button>
			</div>
			<div id="signUpTab" class="tabcontent">
				<form id="signUpForm">
					<div id="aboutYouDiv">
						<p id="aboutYou">About You</p>
						<img id="aboutYouIcon" class="icon" src="icons/personal_details.png" alt="Personal Details">
					</div>
                    <div id="aboutYouFieldsDiv">
                        <ul>
                            <li>
                                <input class="aboutYouFields" type="text" name="lastName" placeholder="Last Name">
                                <input class="aboutYouFields" type="text" name="firstName" placeholder="First Name">
                                <input class="aboutYouFields" type="text" name="address" placeholder="Address">
                            </li>
                        </ul>
                    </div>
					<div id="userDetDiv">
						<p id="userDetails">User Details</p>
						<img id="userDetIcon" class="icon" src="icons/user_details.png" alt="User Details">
					</div>
					<div id="userDetFields">
						<ul>
							<li>
								<input type="text" name="username" placeholder="Username">
								<input type="text" name="e-mail" placeholder="Email"><br>
							</li>
						</ul>
						<ul>
							<li>
								<input type="password" name="password" placeholder="Password">
								<input type="password" name="confirmPassword" placeholder="Confirm Password">
							</li>
						</ul>
					</div>
				</form>
				<button id="submitButton">Submit</button>
			</div>
		</div>
	</div>
    
    <?php echo Html::script('js/login.js'); ?>


	<footer>
		<p>&copy; 2017 DiLy Team. All Rights Reserved.</p>
	</footer>
</body>
</html>