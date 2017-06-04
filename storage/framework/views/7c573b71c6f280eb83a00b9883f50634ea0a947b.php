<?php echo Html::style('css/header.css'); ?>

<?php echo Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    
	<nav class="navbar navbar-default navbar-fixed-top" id="main-nav" data-spy="affix" data-offset-top="14">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href=<?php echo e(route('home')); ?> id="DBrand">
					<span>DiLy.</span>
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				</a>
			</div>
			<div class="navbar-form navbar-left" id="leftNavbar">
				<div class="dropdown" id="dropdown1">
					<span id="menuSpan" data-toggle="dropdown" aria-expanded="true" role="menu">MENU</span>
					<ul class="dropdown-menu" aria-labelledby="menuSpan">
						<li><a href="<?php echo e(route('upload')); ?>">UPLOAD</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo e(route('memories')); ?>">MY MEMORIES</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo e(route('search')); ?>">ADVANCED SEARCH</a></li>
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
					<li><a href=<?php echo e(route('upload')); ?> id="uploadText">UPLOAD</a></li>
					<li><a href=<?php echo e(route('memories')); ?> id="MyMemText">MY MEMORIES</a></li>
					<li>
						<div class="input-group">
							<input spellcheck="false" type="text" id="search" class="form-control" placeholder="Search for..">
							<button class="btn btn-default" type="submit">
								<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
							</button>
						</div>
					</li>
					<li><a href=<?php echo e(route('search')); ?> id="advSearchText">ADVANCED SEARCH</a></li>
				</ul>
			</div>
			<form class="navbar-form navbar-right">
				<?php if(Storage::disk('local')->has($user->username . '-'.$user->id.'\\'.'profile.jpg')): ?>
					<img src="<?php echo e(route('account.image', ['filename' => $user->username . '-'.$user->id.'\\'.'profile.jpg'])); ?>" alt="Profile image" id="pf-photo">
				<?php else: ?>
					<img src="<?php echo e(route('account.image', ['filename' => 'default_profile_img.jpg'])); ?>" alt="Profile image" id="pf-photo">
				<?php endif; ?>

				<span>
					Welcome, <a href=<?php echo e(route('profile')); ?>><?php echo e($user->first_name . ' ' . $user->last_name); ?></a>
					<br>
					<a href=<?php echo e(route('logout')); ?>>Logout</a>
				</span>
			</form>
		</div>
	</nav>

    <div id="myModal" class="modal">
        <span class="close">×</span>
		<?php if(Storage::disk('local')->has($user->username . '-'.$user->id.'\\'.'profile.jpg')): ?>
        <img src="<?php echo e(route('account.image', ['filename' => $user->username . '-'.$user->id.'\\'.'profile.jpg'])); ?>" class="modal-content" id="pf-pht" alt="Profile Photo">
		<?php else: ?>
			<img src="<?php echo e(route('account.image', ['filename' => 'default_profile_img.jpg'])); ?>" class="modal-content" id="pf-pht" alt="Profile Photo">
		<?php endif; ?>
        <div id="caption"></div>
    </div>
</body>
</html>

<?php echo Html::script('https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js'); ?>

<?php echo Html::script('https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js'); ?>

<?php echo Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'); ?>

<?php echo Html::script('js/header.js'); ?>