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
@if (Session::has('message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4 succesuri">
            {{ Session::get('message') }}
        </div>
    </div>
@endif