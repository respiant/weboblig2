window.onload = init;

function init(){

}

function showNavigation() {
    var x = document.getElementById("navMenu");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}