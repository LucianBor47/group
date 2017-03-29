function navFunction() {
	var x = document.getElementById('main-navigation');
	if (x.className === "nav") {
		x.className += " responsive";
	} else {
		x.className = "nav";
	}
}
