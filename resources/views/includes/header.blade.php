{!! Html::style('css/header.css') !!}
{!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
<!DOCTYPE html>
<html lang="en">
<head>
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
				<a class="navbar-brand" href={{route('team_project')}} id="DBrand">
					<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
				</a>
			</div>
			<div class="navbar-form navbar-left" id="leftNavbar">
				<div class="dropdown" id="dropdown1">
					<span id="menuSpan" data-toggle="dropdown" aria-expanded="true" role="menu">MENU</span>
					<ul class="dropdown-menu" aria-labelledby="menuSpan">
						<li><a href="{{route('upload')}}">UPLOAD</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="{{route('memories')}}">MY MEMORIES</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="{{route('search')}}">ADVANCED SEARCH</a></li>
						<li role="separator" class="divider"></li>
						<li>
							<form class="input-group" action="{{route('simple.search')}}" method="post">
								<input spellcheck="false" name="search_text" type="text" id="searchDropdwn" class="form-control" placeholder="Search for..">
								<button class="btn btn-default" type="submit">
									<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
								</button>
								<input type="hidden" name="_token" value="{{Session::token()}}">
								</form>
							</form>
						</li>
					</ul>
				</div>
				<ul class="nav navbar-nav">
					<li><a href={{route('upload')}} id="uploadText">UPLOAD</a></li>
					<li><a href={{route('memories')}} id="MyMemText">MY MEMORIES</a></li>
					<li>
						<form class="input-group">
							<input spellcheck="false" type="text" id="search" class="form-control" placeholder="Search for..">
							<button class="btn btn-default" type="submit">
								<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
							</button>
						</form>
					</li>
					<li><a href={{route('search')}} id="advSearchText">ADVANCED SEARCH</a></li>
				</ul>
			</div>
			<form class="navbar-form navbar-right">

				<img src="{{ route('account.image', ['userId'=>$user->id,'username'=>$user->username]) }}" alt="Profile image" id="pf-photo">

				<span>
					Welcome, <a href={{route('profile')}}>{{$user->first_name}}</a>
					<br>
					<a href={{route('logout')}}>Logout</a>
				</span>
                <a href={{route('profile_settings')}}><span class="glyphicon glyphicon-cog"></span></a>
			</form>
		</div>
	</nav>

    <div id="myModal" class="modal">
        <span class="close">×</span>
        <img src="{{ route('account.image', ['userId'=>$user->id,'username'=>$user->username]) }}" class="modal-content" id="pf-pht" alt="Profile Photo">
        <div id="caption"></div>
    </div>
</body>
</html>

{!! Html::script('https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js') !!}
{!! Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') !!}
{!! Html::script('js/header.js') !!}