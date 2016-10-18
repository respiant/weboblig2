window.onload = init;

function init(){
	//queryDict er en oneliner henta fra stackoverflow:
	var queryDict = {} 
	location.search.substr(1).split("&").forEach(function(item) {queryDict[item.split("=")[0]] = item.split("=")[1]});
	
	var kategori = queryDict['k'];
	kategori = document.getElementById(kategori);

	if (kategori !== null)
		kategori.style.backgroundColor = "rgba(246, 30, 30, 0.3)";
}

function showNavigation() {
    var x = document.getElementById("navMenu");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}