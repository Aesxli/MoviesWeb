<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";
$link = mysqli_connect($host, $username, $password, $db);

$theID=$_POST['reviewId'];


//build a query to delete a specific record based on id
$queryDelete="DELETE FROM reviews WHERE reviewId=$theID";
$status=mysqli_query($link,$queryDelete)or die(mysqli_error($link));
//if statement to check whether the delete is successful
//store the success or error message into variable $message
if($status){
    $message="review has been deleted.";
    $message .= "<p><a href='Movies.php'>Home</a></p>";
}
else{
    $message="review delete failed.";
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <title>Item Delete</title>
    </head>
    <body style="background: #22272a">
        <?php include "navbar.php" ?>
        <div style="text-align: center;color: white">
        <h3>Movie Review - Delete</h3>
        <?php
        echo $message;
        ?>
        </div>
    </body>
</html>