<?php // Script 13.6 - logout.php
session_start();

$current = time();
$logintime = $_SESSION['time'];
$calc = $current - $logintime;
$firstname = $_SESSION['fname'];

unset($_SESSION);

$_SESSION = array();

session_destroy();

// Destroy the cookie, but only if it already exists:
if (isset($_COOKIE['loggedin'])) {
	// Delete the cookie:
	unset($_COOKIE['loggedin']); // added by Ania
	setcookie('loggedin', '');
}
if (isset($_COOKIE['isadmin'])) {
	// Delete the cookie:
	unset($_COOKIE['isadmin']); 
	setcookie('isadmin', '');
}

// Define a page title and include the header:
define('TITLE', 'Logout');
include('templates/header.php');

print '<div id="content" class="col span8">';

// Print a message retrieve cookie data
echo $firstname . ", you are now logged out."; //added by Ania 
//date_default_timezone_set('America/New_York');

echo "  You've been on for " . $calc . " seconds.";

print '</div>';

// Include the footer & sidebar:
include('templates/sidebar.php');
include('templates/footer.php'); 
?>