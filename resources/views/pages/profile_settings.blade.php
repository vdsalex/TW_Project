{!! Html::style('css/profile_settings.css') !!}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DiLy</title>]
</head>
<body>

	<img id="bg-img" src="content/blue-gradient.png" alt="Blue Gradient">

    <header>
    </header>

    <div class="container" id="mainContainer">
    @include ('includes.header')
        @if (count($errors)>0)
            <div class="row">
                <div class="col-md-4 col-md-offset-4 erori">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="changes" id="changes1">
            <div class="caption" id="caption1">
                <p><span class="border">YOU CAN CHOOSE</span></p>
                <p><span class="border">TO CHANGE YOUR PROFILE SETTINGS</span></p>

            </div>
        </div>
        <br>
        <div id="scrollableDiv" >
         <section class="row new-post">
                <div class="col-md-6 col-md-offset-3">
                    <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" id="last_name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $user->username }}" id="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" class="form-control"  id="password">
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm New Password</label>
                            <input type="password" name="password_conf" class="form-control"  id="password">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" name="gender" class="form-control" value="{{ $user->gender }}" id="gender">
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Birth Date</label>
                            <input type="text" name="birth_date" class="form-control" value="{{ $user->birth_date }}" id="birth_date">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $user->address }}" id="address">
                        </div>
                        <div class="form-group">
                            <label for="image">Profile Photo (only .jpg)</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Account</button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                    </form>
                </div>
            </section>

                <section class="row new-post">
                    <div class="col-md-6 col-md-offset-3">
                        @if (Storage::disk('local')->has($user->username . '-'.$user->id.'\\'.'profile.jpg'))
                            <img src="{{ route('account.image', ['filename' => $user->username . '-'.$user->id.'\\'.'profile.jpg']) }}" alt="Profile image" class="img-responsive">
                        @else
                            <img src="{{ route('account.image', ['filename' => 'default_profile_img.jpg']) }}" alt="Profile image" class="img-responsive">
                        @endif
                    </div>
                </section>

        </div>

    </div>

</body>
</html>
{!! Html::script('js/profile_settings.js') !!}