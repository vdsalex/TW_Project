{!! Html::style('css/search_results.css') !!}
{!! Html::style('css/search_results.css') !!}
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>DiLy</title>
</head>
<body>

<div class="bladeContainer">

    @include ('includes.header')

    <img id="bg-img" src="content/blue-gradient.png" alt="Blue Gradient">


    <div class="container" id="contentContainer">
        <br/>
        <div class="col-md-12" id="content-data">
            @foreach($entries as $entry)

            @endforeach
        </div>
    </div>

    <div class="ajax-load text-center" style="display:none">
        <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading more uploads</p>
    </div>

</div>
{!! Html::script('js/my_memories.js') !!}

</body>
</html>

