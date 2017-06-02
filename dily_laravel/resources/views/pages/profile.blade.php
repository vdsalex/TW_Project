{!! Html::style('css/profile.css') !!}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DiLy</title>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
  
</head>
<body>

	<img id="bg-img" src="content/blue-gradient.png" alt="Blue Gradient">

    <header></header>

    <div class="container" id="mainContainer">
    @include ('includes.header')
         <section class="row new-post">
                <div class="col-md-6 col-md-offset-3">
                    <header><h3>Your Account</h3></header>
                    <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                        </div>
                        <div class="form-group">
                            <label for="image">Image (only .jpg)</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Account</button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                    </form>
                </div>
            </section>
            @if (Storage::disk('local')->has($user->username . '-'.$user->id.'\\'.'profile.jpg'))
                <section class="row new-post">
                    <div class="col-md-6 col-md-offset-3">
                        <img src="{{ route('account.image', ['filename' => $user->username . '-'.$user->id.'\\'.'profile.jpg']) }}" alt="" class="img-responsive">
                    </div>
                </section>
            @endif
    </div>

</body>
</html>