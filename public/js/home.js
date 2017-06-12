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

