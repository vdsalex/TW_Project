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
        <a href="#" id="all">All Memories</a>
        <a href="#" id="letters">Letters</a>
        <a href="#" id="iimages">Images</a>
        <a href="#" id="videos">Videos</a>
        <a href="#" id="artefacts">Artefacts</a>
        <a href="#" id="documents">Documents</a>
    </div>
    <header></header>

        <div class="container">
            <h2 class="text-center">Laravel infinite scroll pagination</h2>
            <br/>
            <div class="col-md-12" id="photo-data">
                @include('includes.memories_facebook')
            </div>
        </div>

        <div class="ajax-load text-center" style="display:none">
            <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
        </div>

    </div>

</body>
</html>
{!! Html::script('js/my_memories.js') !!}