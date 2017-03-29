<?php 
// Connect and Select the database

$dbc = mysqli_connect('localhost', 'testUser', 'TestPass!2');
mysqli_select_db($dbc, 'blog_db');
 ?>