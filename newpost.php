<!-- Include the Header -->
<?php include('templates/header.php') ?>

<!-- Create New Blog Post Form * Jim Villanueva -->
<!-- March 22, 2017 - Lindsey Martin added PHP scripts which add new post data to the database -->

	<div id="content" class="col span8">
		<h3 class="subtitle">Create a New Post</h3>

		<?php 
			if (is_loggedin() && is_admin()) {
				include('includes/newpost-form.php');
			} else {
				print '<p>You must be logged in and be a site adminstrator to create a new post.</p>';
			}
		 ?>
	</div>

<!-- End New Blog Post Form -->

<!-- Include the Sidebar -->
<?php include('templates/sidebar.php') ?>

<!-- Include the Footer -->
<?php include('templates/footer.php') ?>