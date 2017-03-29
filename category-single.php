<!-- Include the databse connect and the Header -->
<?php 
include('includes/connect.php');

$id = intval($_GET['id']);
$query = 'SELECT * FROM category WHERE category_id ='.$id;

if (mysqli_connect_error()) {
    die("No connection >:(");
} else {
    if ($r = mysqli_query($dbc, $query)) {
        $data = mysqli_fetch_array($r);
    } else {
        die("Query Failed >:(");
    }    
} 

define('TITLE', $data['category_name']);
include('templates/header.php');

?>


<!-- Single Category list of Posts -->
	<div id="content" class="col span8">
		<h2 class="subtitle"><?php 
			echo ' ' .$data['category_name']. ' ';
		 ?></h2>
		<?php
		//Written by Lucian Bor
		$query = 'SELECT * FROM post WHERE category_id =' .$id;

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

		?>
	
	</div>
<!-- End Page Content -->

<!-- Include the Sidebar -->
<?php include('templates/sidebar.php') ?>

<!-- Include the Footer -->
<?php include('templates/footer.php') ?>