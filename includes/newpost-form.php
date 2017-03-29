<!-- start JV code (3/1/2017) --> 
	<form id="newPostForm" action="newpost-success.php" method="post">
			<p><label><b>Title</b></label><br>
			<input type="text" placeholder="Enter Title" name="title" required></p><br>

			<!-- Lindsey Martin -->
			<p><label for="category"><b>Category</b></label></p>
			<select name="category" id="category">
				<?php include('includes/category-select.php') ?>
			</select>
			<!-- / Lindsey Martin -->

			<p><label><b>Message</b></label><br>
			<textarea name="post" form="newPostForm">Enter your post content</textarea></p><br>

			<button type="submit">Post</button>
	</form>
<!-- end JV code (3/1/2017) -->