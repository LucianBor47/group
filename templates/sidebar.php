				<!-- Sidebar content * Lindsey Martin -->

				<aside class="col span4">
					<div id="search-field" class="col span12 widget">
						<form action="search-results.php" class="search_site">
							<input type="search" name="search">
							<input type="submit" value="Search">
						</form>
					</div>
					<?php 
					if (is_admin() && is_loggedin()) {
						include('includes/user-widget.php');
					}
					 ?>
					<div id="recent-posts" class="col span12 widget">
						<h4>Recent Posts</h4>
						<ul class="secondary_nav">
							<?php include('includes/recent-posts.php') ?>
						</ul>
					</div>
					<div id="categories" class="col span12 widget">
						<h4>Categories</h4>
						<ul class="secondary_nav">
							<?php include('includes/category-list.php') ?>
						</ul>
					</div>
					<div id="about-widget" class="col span12 widget">
						<h4>About</h4>
						<p>This site was developed for the course, Server-Side Programming,
						at Baker College, by: <br><br><strong>Lucian Bor<br> Ania Kuras<br> Jim Villanueva<br> Lindsey Martin.</strong></p>
					</div>

				</aside>

				<!-- end Sidebar content * Lindsey Martin -->