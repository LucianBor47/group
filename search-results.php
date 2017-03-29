<?php 
define('TITLE', 'Search Results');
include('templates/header.php'); 
?>


<!-- Page Content Goes Within the div #content .col .span8 -->
	<div id="content" class="col span8">
		<h2 class="subtitle">Search Results</h2>
		<?php 
		include('includes/connect.php'); 

		$terms = htmlspecialchars(strip_tags($_GET['search']));

		$query = "SELECT * FROM post WHERE post_body LIKE '%" . $terms . "%' OR post_title LIKE '%" . $terms . "%'";

		echo '<p>Articles containing <em><strong>"' . $terms . '"</strong></em>...</p><br>';

		if (mysqli_connect_error()) {
			die("No connection");
		} else {
			if ($r = mysqli_query($dbc, $query)) {
				while ($data = mysqli_fetch_array($r)) {
					echo '<article>';
					echo '<h1><a href="article.php?id='.$data['post_id'].'">'.$data['post_title'].'</a></h1>';
					echo '<div class="post_content"><p>'.substr($data['post_body'], 0, 100).'...</p></div>';
					echo '</article>';
				}
			} else {
				die(mysqli_error());
			}
		}

		?>
	
	</div>
<!-- End Page Content -->

<!-- Include the Sidebar -->
<?php include('templates/sidebar.php'); ?>

<!-- Include the Footer -->
<?php include('templates/footer.php'); ?>