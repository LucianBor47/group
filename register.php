<!-- Include the Header -->
<?php 
define('TITLE', 'Register');
include('templates/header.php'); 
?>


<!-- Registration Form * Jim Villanueva -->

	<div id="content" class="col span8">
		<h3 class="subtitle">Register</h3>

		<!-- start JV code (3/1/2017) -->
		<form id="registrationForm" action="registration-success.php" method="post">
			<p><label><b>First Name</b></label><br>
			<input type="text" placeholder="First Name" name="firstName" required></p><br>

			<p><label><b>Last Name</b></label><br>
			<input type="text" placeholder="Last Name" name="lastName" required></p><br>

			<p><label><b>E-mail</b></label><br>
			<input type="email" placeholder="Enter E-mail" name="email" required></p><br>

			<h3 class="subtitle">Select an ID and password</h3>
			<p><label><b>User ID</b></label><br>
			<input type="text" placeholder="Enter User ID" name="userID" required></p><br>

			<p><label><b>Password</b></label><br>
			<input type="password" placeholder="Enter Password" name="password1" required></p><br>

			<p><label><b>Retype Password</b></label><br>
			<input type="password" placeholder="Enter Password Again" name="password2" required></p><br>

			<button type="submit">Register</button>
		</form>
      				<!-- end JV code (3/1/2017) -->
	</div>

<!-- End Registration Form -->

<!-- Include the Sidebar -->
<?php include('templates/sidebar.php') ?>

<!-- Include the Footer -->
<?php include('templates/footer.php') ?>