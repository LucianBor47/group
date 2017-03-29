<?php 
// Error checking variable
$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (!empty($_POST['user_name']) && !empty($_POST['password'])) {
		
		include('includes/connect.php'); // Connect to the database

		$name = $_POST['user_name'];
		$pass = $_POST['password'];
		$query = 'SELECT * FROM user WHERE user_name = "'.$name.'"';

		if (mysqli_connect_error()) {
			die("No connection.");
		} else {
			if ($r = mysqli_query($dbc, $query)) {
				$data = mysqli_fetch_array($r); // Get the data array

				if (md5($pass) === $data['user_password'] && $name === $data['user_name']) {
					// Use a session to store user data 
					session_start();

					$_SESSION['name'] = $data['user_name'];
					$_SESSION['fname'] = $data['user_fname'];
					$_SESSION['lname'] = $data['user_lname'];
					$_SESSION['email'] = $data['user_email'];
					$_SESSION['time'] = time();
					if ($data['user_admin']) {
						setcookie('isadmin', TRUE);
					} else {
						setcookie('isadmin', 0);
					}

					setcookie('loggedin', $data['user_name']);

					ob_end_clean();
					header('Location: user_home.php');
					exit();

				} else {
					$error = 'Incorrect username or password.';
				}				
			} else {
				die("Query failed.");
			}
		}

	} else { // Form not complete
		$error = 'Please enter a user name and password.';
	}
}


define('TITLE', 'Login');
include('templates/header.php'); 
?>
	<div id="content" class="col span8">
		<h3 class="subtitle">Log in</h3>

		<!-- Lindsey Martin -->
		<?php 
			if ($error) {
				print '<p class="error">' . $error . '</p>';
			}

			if (!is_loggedin()) {
				include('includes/login-form.php');
			} else {
				print '<p>You are already logged in.</p>';
			}
		 ?>
		 <!-- / Lindsey Martin -->

	</div>

<?php
include('templates/sidebar.php');
include('templates/footer.php');
?>