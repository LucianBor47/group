<?php 
include('includes/functions.php');
ob_start();
?>
<!DOCTYPE html>
<html>
	
	<head>
		<!-- Group 1 Project
			 WEB 231 - Server Side Programming
			 Lucian Bor, Ania Kuras, Jim Villaneuva, & Lindsey Martin
			 HTML template * Lindsey Martin
			 Updated with PHP templates 3/20/2017 * Lindsey Martin -->
		<title><?php 
			if (defined('TITLE')) {
				print TITLE;
			} else {
				print "Web Development Blog";
			}
		 ?></title>
		<link rel="stylesheet" href="css/main.css">
		<script type="text/javascript" src="js/nav.js"></script>
	</head>

	<body>
		 <!-- TOP SECTION * Lindsey Martin -->
		<div id="top" class="section group"> 
			<div id="nav-wrapper" class="section group">
				<div class="container">
				<!-- Main Navigation * Lindsey Martin -->
						<nav class="span12">
							<ul id="main-navigation" class="nav">
								<li><a href="index.php">Home</a></li>
								<li><a href="#">About</a></li>
								<li><a href="category.php">Categories</a></li>
								<li><a href="contact.php">Contact Us</a></li>
								<li class="icon">
									<a href="javascript:void(0);" onclick="navFunction()">&#9776;</a>
								</li>
								<div id="login-menu"><!-- Lindsey Martin -->
									<?php 
									if (is_loggedin()) {
										$user = $_COOKIE['loggedin'];
										echo '<li><a href="user_home.php">'.$user.'</a></li>';
										echo '<li id="link_sep">|</li>';
										echo '<li><a href="logout.php">Logout</a></li>';
									 } else {
									 	echo '<li><a href="login.php">Login</a></li>';
									 	echo '<li id="link_sep">|</li>';
									 	echo '<li><a href="register.php">Register</a></li>';
									 } ?>
								</div>
							</ul>
						</nav>
				<!-- / Main Navigation * Lindsey Martin -->
				</div>
			</div><!-- / nav-wrapper * Lindsey Martin -->

			<div id="header-wrapper" class="section group">
				<!-- Header -->
				<header class="container">
					<h1 class="title">Web Development Blog</h1>
				</header>
				<!-- / Header * Lindsey Martin -->
			</div><!-- / Header Wrapper * Lindsey Martin -->
		</div>
		<!-- / TOP SECTION * Lindsey Martin -->

		<!-- Begin Page Content * Lindsey Martin -->
		<div id="content-wrapper" class="section group">
			<div class="container">