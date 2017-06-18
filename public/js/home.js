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
<<<<<<< HEAD
}

function hideF() {
    var xs = document.getElementsByClassName("hideBut");
    for(var i = 0; i < xs.length; i++){
        x=xs[i];
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
    }
=======
>>>>>>> 445d68b6a096bc777482940741cd97bdb6ce6a24
}