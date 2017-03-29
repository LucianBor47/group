<?php
include ('includes/connect.php');

$id = intval($_GET['id']);
$query = 'SELECT * FROM post WHERE post_id ='.$id;

if (mysqli_connect_error()) {
    die("No connection >:(");
} else {
    if ($r = mysqli_query($dbc, $query)) {
        $data = mysqli_fetch_array($r);
    } else {
        die("Query Failed >:(");
    }    
} 

// Set the page title and include the header file:
define('TITLE', $data['post_title']);
include('templates/header.php');
?>

<!-- Article.php Written by Lucian Bor -->
	<div id="content" class="col span8">
        <h2 class="subtitle"><?php echo $data['post_title']; ?> </h2>
        <div class="date"><?php echo date("m/d/Y" ,strtotime($data['post_date'])) ?></div>
		<div id="posts">
                    <?php echo $data['post_body']; ?>
		</div>
        <div><?php 
            if (is_admin()) {
                print "<p><b>Post Admin:</b> <a href=\"edit-article.php?id={$data['post_id']}\">Edit</a> | 
                <a href=\"delete-article.php?id={$data['post_id']}\">Delete</a>
                </p>\n";
            }

         ?></div>
	</div>
<?php
include ('templates/sidebar.php');
include ('templates/footer.php');
?>
