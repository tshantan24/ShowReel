function logOut() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//document.getElementById("result").style.display = "inline-block";
		} else {
			alert("Couldn't logout. Please try again.");
		}
	}
	xhttp.open("GET", "logout.php", true);
	xhttp.send();
} 