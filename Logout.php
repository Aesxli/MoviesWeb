<?php
session_start();
if (isset($_SESSION['user_id'])) {
    session_destroy();
    $_SESSION = array();
}
$message = "You have logged out.";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <?php include "navbar.php" ?>
        <h3>Movie Review - Logout</h3>
        <?php
        echo $message;
        ?>
    </body>
</html>


