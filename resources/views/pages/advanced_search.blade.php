{!! Html::style('css/advanced_search.css') !!}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DiLy</title>
 
</head>
<body>

	<img id="bg-img" src="content/blue-gradient.png" alt="Blue Gradient">

    <header></header>

    <div class="container" id="mainContainer">
    @include ('includes.header')
        <div id="mySidenav1" class="sidenav">
            <br>
            <form>
                <a ><input name="object" type="radio">Artefact</a>
                <a ><input name="object" type="radio">Document</a>
                <a ><input name="object" type="radio">Letter</a>
                <a ><input name="object" type="radio">Picture</a>
                <a ><input name="object" type="radio">Video</a>
            </form>
            <a class="closebtn" onclick="closeNav1()">
                <input type="submit" value="Submit">
            </a>
        </div>
        <div id="mySidenav2" class="sidenav">
            <br>
            <form>
                <a ><input name="grade" type="radio">1</a>
                <a ><input name="grade" type="radio">2</a>
                <a ><input name="grade" type="radio">3</a>
            </form>
            <a class="closebtn" onclick="closeNav2()">
                <input type="submit" value="Submit">
            </a>
        </div>
        <div class="advanced_search">
            <br><br>
            <span style="font-size:30px;cursor:pointer" onclick="openNav1()" id="advanced_search_obj">Chose Object</span>
            <br><br>
            <span style="font-size:30px;cursor:pointer" onclick="openNav2()" id="advanced_search_rr">Chose Relationships</span>
            <br><br>

            <form>
                    <input type="text" name="search" placeholder="Search.."><br><br>
                    <button type="submit" class="btn btn-default" id="searchBtn">Search</button>
            </form>

        </div>
    </div>

</body>
</html>
{!! Html::script('js/advanced_search.js') !!}