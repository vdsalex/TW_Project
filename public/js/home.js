/**
 * Created by Alina Coca on 12.06.2017.
 */

var modal = document.getElementById('modal_id');

var images = document.getElementsByClassName("img-rounded");
for(var i = 0; i < images.length; i++){
    var img = images[i];
    var modalImg = document.getElementById("img2");
    var captionText = document.getElementById("caption2");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        modalImg.alt = this.alt;
        captionText.innerHTML = this.alt;
    }
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
    modal.style.display = "none";
}

function openCol(evt, colName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(colName).style.display = "block";
    evt.currentTarget.className += " active";
}

function hideF(btn)
{
    if(btn.nextElementSibling.style.display === "none")
    {
        btn.nextElementSibling.style.display = "block";
    }
    else btn.nextElementSibling.style.display = "none";
}

var page = 2;
var processing=false;
var done=false;

$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        if (processing===false && done===false) {
            loadMoreData(page);
            page++;
        }
    }
});

function loadMoreData(page){
    $.ajax(
        {
            url: 'getHomeContent' + '?page=' + page,
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
            $("#mainContainer").append(data.html);
            processing=false;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
            alert('Server not responding...');
        });
}


$('document').ready(loadMoreData(1));