<!-- This is a blank PHP template that can be used to create
	 additional pages in the blog site * Lindsey Martin -->

<!-- Include the Header -->
<?php 
define('TITLE', 'Registration Successful');
include('templates/header.php'); 
?>


<!-- Page Content Goes Within the div #content .col .span8 -->
	<div id="content" class="col span8">

		<?php 
			include('includes/connect.php');

			// Validate the form data:
			$problem = FALSE;

			if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && 
				!empty($_POST['userID']) && !empty($_POST['password1']) && !empty($_POST['password2'])) {
				$first_name = trim(strip_tags($_POST['firstName']));
				$last_name = trim(strip_tags($_POST['lastName']));
				$email = trim(strip_tags(htmlspecialchars($_POST['email'])));
				$user_name = trim(strip_tags($_POST['userID']));

				if ($_POST['password1'] == $_POST['password2']) {
					$password = $_POST['password1'];
				} else {
					print '<p>Passwords did not match. <a href="register.php">Try Again.</a></p>';
					$problem = TRUE;
				}
			} else {
				$problem = TRUE;
			}

			if (!$problem) {
				
				$query = "INSERT INTO user (user_id, user_name, user_password, user_fname, user_lname, user_email, user_admin) VALUES (DEFAULT, '$user_name', '$password', '$first_name', '$last_name', '$email', 0)";

			    if (@mysqli_query($dbc, $query)) {
			    	print '<p class="success";>Your account has been created! You can now <a href="login.php">Login</a></p>';
			    } else {
			    	print '<p class="error";>Something went wrong. Please contact the site administrator, or: </p>';
			    	print '<p><a href="register.php">Try Again</a></p>';
			    }
			}

			mysqli_close($dbc);
		?>
	
	</div>
<!-- End Page Content -->

<!-- Include the Sidebar -->
<?php include('templates/sidebar.php') ?>

<!-- Include the Footer -->
<?php include('templates/footer.php') ?>