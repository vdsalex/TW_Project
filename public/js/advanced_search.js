/**
 * Created by Alina Coca on 11.06.2017.
 */
function openNav1() {
    closeNav2();
    document.getElementById("mySidenav1").style.width = "250px";
    document.getElementById("advanced_search_obj").style.marginLeft = "250px";
    document.getElementById("advanced_search_rr").style.marginLeft = "250px";
    document.getElementById("search").style.marginLeft = "250px";

    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav1() {
    document.getElementById("mySidenav1").style.width = "0";
    document.getElementById("advanced_search_obj").style.marginLeft= "0";
    document.getElementById("advanced_search_rr").style.marginLeft= "0";
    document.getElementById("search").style.marginLeft= "0";

    document.body.style.backgroundColor = "white";
}

function openNav2() {
    closeNav1();
    document.getElementById("mySidenav2").style.width = "250px";
    document.getElementById("advanced_search_obj").style.marginLeft = "250px";
    document.getElementById("advanced_search_rr").style.marginLeft = "250px";
    document.getElementById("search").style.marginLeft = "250px";

    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav2() {
    document.getElementById("mySidenav2").style.width = "0";
    document.getElementById("advanced_search_obj").style.marginLeft = "0";
    document.getElementById("advanced_search_rr").style.marginLeft= "0";
    document.getElementById("search").style.marginLeft= "0";

    document.body.style.backgroundColor = "white";
}