{!! Html::style('css/header.css') !!}
{!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    
	<nav class="navbar navbar-default navbar-fixed-top" id="main-nav" data-spy="affix" data-offset-top="14">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href={{route('home')}} id="DBrand">
					<span>DiLy.</span>
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				</a>
			</div>
			<div class="navbar-form navbar-left" id="leftNavbar">
				<div class="dropdown" id="dropdown1">
					<span id="menuSpan" data-toggle="dropdown" aria-expanded="true" role="menu">MENU</span>
					<ul class="dropdown-menu" aria-labelledby="menuSpan">
						<li><a href="#">UPLOAD</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">MY MEMORIES</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">ADVANCED SEARCH</a></li>
						<li role="separator" class="divider"></li>
						<li>
							<div class="input-group">
								<input spellcheck="false" type="text" id="searchDropdwn" class="form-control" placeholder="Search for..">
								<button class="btn btn-default" type="submit">
									<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
								</button>
							</div>
						</li>
					</ul>
				</div>
				<ul class="nav navbar-nav">
					<li><a href={{route('upload')}} id="uploadText">UPLOAD</a></li>
					<li><a href={{route('memories')}} id="MyMemText">MY MEMORIES</a></li>
					<li>
						<div class="input-group">
							<input spellcheck="false" type="text" id="search" class="form-control" placeholder="Search for..">
							<button class="btn btn-default" type="submit">
								<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
							</button>
						</div>
					</li>
					<li><a href={{route('search')}} id="advSearchText">ADVANCED SEARCH</a></li>
				</ul>
			</div>
			<form class="navbar-form navbar-right">
				@if (Storage::disk('local')->has($user->username . '-'.$user->id.'\\'.'profile.jpg'))
					<img src="{{ route('account.image', ['filename' => $user->username . '-'.$user->id.'\\'.'profile.jpg']) }}" alt="Profile image" id="pf-photo">
				@else
					<img src="{{ route('account.image', ['filename' => 'default_profile_img.jpg']) }}" alt="Profile image" id="pf-photo">
				@endif

				<span>
					Welcome, <a href={{route('profile')}}>{{$user->first_name . ' ' . $user->last_name}}</a>
					<br>
					<a href={{route('logout')}}>Logout</a>
				</span>
			</form>
		</div>
	</nav>

    <div id="myModal" class="modal">
        <span class="close">×</span>
		@if (Storage::disk('local')->has($user->username . '-'.$user->id.'\\'.'profile.jpg'))
        <img src="{{ route('account.image', ['filename' => $user->username . '-'.$user->id.'\\'.'profile.jpg']) }}" class="modal-content" id="pf-pht" alt="Profile Photo">
		@else
			<img src="{{ route('account.image', ['filename' => 'default_profile_img.jpg']) }}" class="modal-content" id="pf-pht" alt="Profile Photo">
		@endif
        <div id="caption"></div>
    </div>
</body>
</html>
{!! Html::script('js/header.js') !!}
{!! Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') !!}