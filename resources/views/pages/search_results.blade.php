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

        </div>
    </div>

    <div class="ajax-load text-center" style="display:none">
        <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading more uploads</p>
    </div>

</div>

<script>
    var page = 1;
    var search_text = '{{ $text }}';

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page,search_text);
        }
    });

    function loadMoreData(page,search_text){
        $.ajax(
            {
                url: 'getSearchContent/' + search_text + '?page=' + page,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                if(data.html == ""){

                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#content-data").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('Server not responding...');
            });
    }

    $('document').ready(loadMoreData(1,search_text));


</script>

</body>
</html>

