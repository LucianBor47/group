<!-- Include header * Lindsey Martin -->
<?php include('templates/header.php') ?>

<!-- Index Page Content Area:
	(Replace this code with dynamic PHP that pulls most 
	recent posts from the database. Use same classes to maintain layout. * Lindsey Martin) -->
	
	<div id="content" class="col span8">
		<h3 class="subtitle">Posts</h3>
		<div id="posts">
			<?php
				include('includes/connect.php');
				//Written by Lucian Bor
				$query = 'SELECT * FROM post ORDER BY post_date DESC';

				if (mysqli_connect_error()) {
				    die("No connection >:(");
				} else {
				    if ($r = mysqli_query($dbc, $query)) {
				        while ($data = mysqli_fetch_array($r)) {
				            echo '<article>';
					    echo '<div class="date">'.date("m/d/Y" ,strtotime($data['post_date'])).'</div>';
				            echo '<h1><a href="article.php?id='.$data['post_id'].'">'.$data['post_title'].'</a></h1>';
					    echo '<div class="post_content"><p>'.substr($data['post_body'], 0, 100).'...</p></div>';
					    echo '</article>';
				        }
				    } else {
				        die("Query Failed >:(");
				    }
				}

				mysqli_close($dbc);
			?>
		</div>
	</div>
<!-- / Index Page Content Area -->

<!-- Include Sidebar * Lindsey Martin -->
<?php include('templates/sidebar.php') ?>

<!-- Include footer * Lindsey Martin -->
<?php include('templates/footer.php') ?>