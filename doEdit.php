<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";
$link = mysqli_connect($host, $username, $password, $db);

//retrieve computer details from the textarea on the previous page
$updatedDesc = $_POST['details'];
$updatedRate= $_POST['rate'];
$updatedDate= $_POST['date'];
//retrieve id from the hidden form field of the previous page
$theID = $_POST['id'];

$msg = "";

//build a query to update the table
//update the record with the details from the form
$queryUpdate = "UPDATE reviews 
                SET review='$updatedDesc',rating='$updatedRate',datePosted='$updatedDate'
                WHERE reviewId = $theID";

//execute the query
$resultUpdate = mysqli_query($link, $queryUpdate)
        or die(mysqli_error($link));

//if statement to check whether the update is successful
//store the success or error message into variable $msg
if ($resultUpdate) {
    $msg = "record successfully updated";
    $msg .= "<p><a href='Movies.php'>Home</a></p>";
} else {
    $msg = "record not updated";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
        <title></title>
    </head>
    <body style="background: #22272a;text-align: center">
        <?php include "navbar.php" ?>
        <h3 style="color:white">Movie Review - Edit</h3>
        <div style="color:white"> <?php
        echo $msg;
        ?>
        </div>
    </body>
</html>

