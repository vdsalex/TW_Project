{!! Html::style('css/my_memories.css') !!}
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

    <div id="categorySidenav" class="sidenav">
        <a href="#" id="all" onclick="displayContent(this)">All Memories</a>
        <a href="#" id="letter" onclick="displayContent(this)">Letters</a>
        <a href="#" id="photo" onclick="displayContent(this)">Images</a>
        <a href="#" id="video" onclick="displayContent(this)">Videos</a>
        <a href="#" id="artefact" onclick="displayContent(this)">Artefacts</a>
        <a href="#" id="document" onclick="displayContent(this)">Documents</a>
        <a href="#" id="facebook" onclick="displayContent(this)">Facebook</a>

    </div>

    <header></header>

        <div class="container" id="contentContainer">
                      <br/>
            <div class="col-md-12" id="content-data">

            </div>
        </div>

        <div class="ajax-load text-center" style="display:none">
            <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading more uploads</p>
        </div>

    </div>

</body>
</html>
{!! Html::script('js/my_memories.js') !!}