<?php

//Written by Lucian Bor
include('connect.php');

$query = 'SELECT * FROM category';

if (mysqli_connect_error()) {
    die("No connection >:(");
} else {
    if ($r = mysqli_query($dbc, $query)) {
        while ($data = mysqli_fetch_array($r)) {
            echo '<li><a href="category-single.php?id='.$data['category_id'].'">'.$data['category_name'].'</a></li>';
        }
    } else {
        die("Query Failed >:(");
    }
}

mysqli_close($dbc);

?>