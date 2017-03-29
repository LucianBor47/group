<!-- Include header -->
<?php 
define('TITLE', 'Contact Us');
include('templates/header.php'); 
?>

<!-- Contact Page Content - Jim Villanuava -->
<div id="content" class="col span8">
	<h3 class="subtitle">Contact Us</h3>
	<!-- start JV code (3/1/2017) -->
	<form id="contactForm" action="php/contact.php" method="post">
		<p><label><b>Name</b></label><br>
		<input type="text" placeholder="Enter Name" name="name" maxlength="35" required></p><br>

		<p><label><b>E-mail Address</b></label><br>
		<input type="email" placeholder="Enter E-mail Address" name="email" maxlength="255" required></p><br>

		<p><label><b>Message</b></label><br>
		<textarea name="message" form="contactForm" maxlength="2048">Enter your message</textarea></p><br>

		<button type="submit" name="submit">Send</button>
	</form>					<!-- end JV code (3/1/2017) -->
</div>
<!-- / Contact Page Content -->

<!-- Include Sidebar * Lindsey Martin -->
<?php include('templates/sidebar.php') ?>

<!-- Include Footer * Lindsey Martin -->
<?php include('templates/footer.php') ?>