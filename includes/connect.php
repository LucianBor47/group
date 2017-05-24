<?php 
// Connect and Select the database

$dbc = mysqli_connect('localhost', 'test', '1234');
mysqli_select_db($dbc, 'db');
 ?>
