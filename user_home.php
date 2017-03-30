<?php
session_start();
define('TITLE', ''. $_SESSION['fname'] . '\'s Home Page');
include('templates/header.php');
if (!$_SESSION) {
    header("Location: login.php");
}
?>
<div id="content" class="col span8">
    <h2>Welcome to your home page <?php echo $_SESSION['name']; ?>!</h2>
    <ul id='loginUl' style='margin-top: 1.5em; list-style: none;'>
        <li>Your last name is: <?php echo $_SESSION['lname']; ?></li>
        <li>Your email is: <?php echo $_SESSION['email']; ?></li>
        <?php
            if (isset($_COOKIE['isadmin'])) {
                print '<li>You are an admin.</li>';
            } else {
                print '<li>You are not an admin.</li>';
            }
         ?>
 
<?php
    include('includes/connect.php');
    //Written by Lucian Bor
    $query = 'SELECT * FROM post WHERE user_id ='.$_SESSION['user_id'].' ORDER BY post_date DESC';

    if (mysqli_connect_error()) {
        die("No connection >:(");
    } else {
        if ($r = mysqli_query($dbc, $query)) {
            while ($data = mysqli_fetch_array($r)) {
	        echo '<article>';
	        echo '<div class="date">'.date("m/d/Y" ,strtotime($data['post_date'])).'</div>';
	        echo '<h1><a href="article.php?id='.$data['post_id'].'">'.$data['post_title'].'</a></h1>';
                echo '<div class="post_content"><p>'.substr($data['post_body'], 0, 100).'...</p></div>';
                if (is_admin()) {
                    print "<p><a href=\"edit-article.php?id={$data['post_id']}\">Edit</a> | 
                <a href=\"delete-article.php?id={$data['post_id']}\"> Delete</a>
                </p>\n";
                }
	        echo '</article>';
	    }
	} else {
            die("Query Failed >:(");
        }
    }

    mysqli_close($dbc);
?>
        <?php
            if (isset($_COOKIE['isadmin'])) {
                print '<li>You are an admin.</li>';
            } else {
                print '<li>You are not an admin.</li>';
            }
         ?>
    </ul>
</div>
<?php
include('templates/sidebar.php');
include('templates/footer.php');
?>

