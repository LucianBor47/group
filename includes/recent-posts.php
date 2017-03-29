<?php

//Written by Lucian Bor
include('connect.php');

$query = 'SELECT * FROM post ORDER BY post_date DESC';

if (mysqli_connect_error()) {
    die("No connection >:(");
} else {
    if ($r = mysqli_query($dbc, $query)) {
        while ($data = mysqli_fetch_array($r)) {
            echo '<li><a href="article.php?id='.$data['post_id'].'">'.$data['post_title'].'</a></li>';
        }
    } else {
        die("Query Failed >:(");
    }
}

mysqli_close($dbc);

?>
