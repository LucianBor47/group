<?php
session_start();
define('TITLE', ''. $_SESSION['fname'] . '\'s Home Page');
include('templates/header.php');

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
    </ul>
</div>
<?php

include('templates/sidebar.php');
include('templates/footer.php');
?>