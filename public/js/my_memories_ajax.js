var page = 1;
var currentContent="photo";

$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        page++;
        loadMoreData(page,currentContent);
    }
});

function displayContent(button)
{
    jQuery('#content-data').html('');
    page=1;
    currentContent=button.id;
    loadMoreData(page,currentContent);
}

function loadMoreData(page,content_type){
    $.ajax(
        {
            url: 'getContent/' + content_type + '?page=' + page,
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

$('document').ready(loadMoreData(1,currentContent));

