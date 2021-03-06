{!! Html::style('css/login.css') !!}
{!! Html::style("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css") !!}


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
		<br><br><br><br>
	@include ('includes.errors_success')
	<div id="loginAndDesc">
		<p id="description">Store your sentimental information with DiLy.</p>
		<div id="loginBox">
			<button class="tablink" onclick="openTab('loginButton', this, 'loginTab')" id="loginButton">Login</button>
			<button class="tablink" onclick="openTab('signUpButton', this, 'signUpTab')" id="signUpButton">Sign Up</button>
			<div id="loginTab" class="tabcontent">
				<div id="loginWithPanel">
					<p>Login with:</p>
					<a href="{{route('provider.auth','facebook')}}"> <img id="facebookIcon" class="icon" src="icons/facebook_icon.png" alt="Facebook Icon"></a>
					<a href="{{route('provider.auth','google')}}"> <img id="gmailIcon" class="icon" src="icons/gmail_icon.png" alt="GMail Icon"></a>

				</div>
				<form id="loginForm" action="{{route('signin')}}" method="POST">
					<ul>
						<li>
							<div id="usernameLoginDiv">
								<img id="userIcon" class="icon" alt="User Icon" src="icons/user_icon.png">
								<input class="loginTextFields" type="text" name="username" placeholder="Username" value="{{\Illuminate\Support\Facades\Request::old('username')}}">
							</div>
						</li>
						<li>
							<div id="passwordLoginDiv">
								<img id="passwordIcon" class="icon" alt="Password Icon" src="icons/password_icon.png">
								<input class="loginTextFields" type="password" name="password" placeholder="Password" value="{{\Illuminate\Support\Facades\Request::old('password')}}">
								<input type="hidden" name="_token" value="{{Session::token()}}">
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
					<button type="submit" id="loginToAccountButton">Login to your Account</button>
				</form>

			</div>
			<div id="signUpTab" class="tabcontent">
				<form id="signUpForm" action="{{route('signup')}}" method="POST">
					<div id="aboutYouDiv">
						<p id="aboutYou">About You</p>
						<img id="aboutYouIcon" class="icon" src="icons/personal_details.png" alt="Personal Details">
					</div>
                    <div id="aboutYouFieldsDiv">
                        <ul>
                            <li>
                                <input class="aboutYouFields" type="text" name="last_name" placeholder="Last Name" value="{{\Illuminate\Support\Facades\Request::old('last_name')}}">
                                <input class="aboutYouFields" type="text" name="first_name" placeholder="First Name" value="{{\Illuminate\Support\Facades\Request::old('first_name')}}">
                                <input class="aboutYouFields" type="text" name="address" placeholder="Address" value="{{\Illuminate\Support\Facades\Request::old('address')}}">
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
								<input type="text" name="email" placeholder="Email"><br>
							</li>
						</ul>
						<ul>
							<li>
								<input type="password" name="password" placeholder="Password">
								<input type="password" name="confirmPassword" placeholder="Confirm Password">
								<input type="hidden" name="_token" value="{{Session::token()}}">
							</li>
						</ul>
					</div>
					<button type="submit" id="submitButton">Submit</button>
				</form>

			</div>
		</div>
	</div>
    
    {!! Html::script('js/login.js')!!}

	<footer>
		<p>&copy; 2017 DiLy Team. All Rights Reserved.</p>
	</footer>
</body>
</html>