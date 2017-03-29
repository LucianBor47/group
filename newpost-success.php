<!-- Insert New Post into Database and show a success message * Lindsey Martin -->
<?php 
include('includes/connect.php');
define('TITLE', 'Posting Successful');
include('templates/header.php');

			// Validate the form data:
			$problem = FALSE;
			$author = $_COOKIE['loggedin'];
			
			//Check if the user is logged in and collect the User ID
			if (is_loggedin()) {
				$query = 'SELECT * FROM user WHERE user_name = "'. $author .'"';
				if ($r = mysqli_query($dbc, $query)) {
					$data = mysqli_fetch_array($r);

					$userID = $data['user_id'];
				}

			// If the post is not empty, collect the user input
			if (!empty($_POST['title']) && !empty($_POST['post'])) {
				$title = trim(strip_tags($_POST['title']));
				$post = trim(strip_tags($_POST['post']));
				$category = $_POST['category'];
			} else {
				$problem = TRUE;
			}

			if (!$problem) { // If no problems with the form, run the query to insert post info into the database. 
				
				$query = "INSERT INTO post (post_id, user_id, category_id, post_date, post_title, post_body) VALUES (DEFAULT, $userID, $category, NOW(), '$title', '$post')";

			    if (@mysqli_query($dbc, $query)) {
			    	$problem = FALSE;
			    } else {
			    	$problem = 'The post could not be added. Please contact the site administrator or try again.';
			    }
			}

			}

			mysqli_close($dbc);

?>


<!-- Page Content Goes Within the div #content .col .span8 -->
	<div id="content" class="col span8">
		
		<?php 
			if ($problem) {
				print '<p>'.$problem.'</p>';
			} else {
				print '<p>Your new post was created!</p>';
			}
		 ?>
	
	</div>
<!-- End Page Content -->

<!-- Include the Sidebar -->
<?php include('templates/sidebar.php') ?>

<!-- Include the Footer -->
<?php include('templates/footer.php') ?>