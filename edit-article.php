<!-- Page to edit article content * Lindsey Martin -->

<?php 
define('TITLE', 'Edit Article');
include('templates/header.php');
include ('includes/connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) { 
	
	$query = "SELECT * FROM post WHERE post_id={$_GET['id']}";
	if ($r = mysqli_query($dbc, $query)) {
		$data = mysqli_fetch_array($r);

		// Show the Form:

		print '<div id="content" class="col span8">
			<h3 class="subtitle">Edit Post "'.$data['post_title'].'"</h3>
			<form id="editPostForm" action="edit-article.php" method="post">
			<p><label><b>Title</b></label><br>
			<input type="text" name="title" required value="'. htmlentities($data['post_title']). '"></p><br>
			<p><label><b>Message</b></label><br>
			<textarea name="post" form="newPostForm">'. htmlentities($data['post_body']). '</textarea></p><br>
			<button type="submit">Update Post</button>
			</form>
			</div>';
	} else {
		print '<div id="content" class="col span8"><p class="error">Could not retrieve the post data because:
		<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p></div>';
	}

} elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0) ) {
	
	$problem = FALSE;
	if (!empty($_POST['title']) && !empty($_POST['post'])) {
		
		$title = trim(strip_tags($_POST['title']));
		$post = trim(strip_tags($_POST['post']));
	} else {
		print '<div id="content" class="col span8"><p class="error">Please submit both a post title and message.</p></div>';
		$problem = TRUE;
	}

	if (!$problem) {
		
		$query = "UPDATE post SET post_title='$title', post_body='$post' WHERE post_id={$_POST['id']}";
		if ($r = mysqli_query($dbc, $query)) {
			print '<div id="content" class="col span8"><p>The post was updated</p></div>';
		} else {
			print '<div id="content" class="col span8"><p class="error">Could not update the post because: <br>'. mysql_error($dbc) . '.</p><p>The query being run was: '. $query . '</p></div>';
		}
	}
} else {
	print '<div id="content" class="col span8"><p class="error">This page has been accessed in error</p></div>';
}

mysqli_close($dbc);

include ('templates/sidebar.php');
include ('templates/footer.php');
?>