var page = 2;
var processing=false;
var done=false;

var currentContent="photo";

$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        if (processing===false && done===false) {
        loadMoreData(page,currentContent);
        page++;
        }
    }
});

function displayContent(button)
{
    jQuery('#content-data').html('');
    page=2;
    done=false;
    currentContent=button.id;
    loadMoreData(1,currentContent);
}

function loadMoreData(page,content_type){
    $.ajax(
        {
            url: 'getContent/' + content_type + '?page=' + page,
            type: "get",
            beforeSend: function()
            {
                $('.ajax-load').show();
                processing=true;
            }
        })
        .done(function(data)
        {
            if(data.html == ""){

                $('.ajax-load').html("No more records found");
                done=true;
                return;
            }
            $('.ajax-load').hide();
            $("#content-data").append(data.html);
            processing=false;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
            alert('Server not responding...');
        });
}

$('document').ready(loadMoreData(1,currentContent));

