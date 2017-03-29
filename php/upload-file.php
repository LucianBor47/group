<?php 
if ($_SERVER['REQUEST METHOD']) == 'POST' {
	if (move_uploaded_file($_FILES['the_file']['tmp_name'], "../images/uploads/{$_FILES['the_file']['name']}")) {
		header("Location: http://baker.lindsey-martin.com/testing/blog/newpost.php");
	} else {
		print '<p>Could not be uploaded</p>';
	}
}

 ?>