{!! Html::style('css/search_results.css') !!}
{!! Html::style('css/my_memories.css') !!}
{!! Html::style('css/home.css') !!}
{!! Html::script('js/my_memories_style.js') !!}
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
            @include('layouts.home_content')
        </div>
    </div>


</div>

</body>
</html>

