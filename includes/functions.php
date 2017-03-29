<?php 

function is_admin() {

	if (isset($_COOKIE['isadmin'])) {
		return true;
	} else {
		return false;
	}
}

function is_loggedin() {

	if (isset($_COOKIE['loggedin'])) {
		return true;
	} else {
		return false;
	}
}

?>