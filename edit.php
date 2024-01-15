<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";
$link = mysqli_connect($host, $username, $password, $db);

$RID = $_POST['reviewId'];


// create query to retrieve a single record based on the value of $compID 
$queryItem = "SELECT * FROM reviews
          WHERE reviewId=$RID";

// execute the query
$result= mysqli_query($link, $queryItem) or 
                die(mysqli_error($link));

// fetch the execution result to an array
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body style="background: #22272a">
        <?php include "navbar.php" ?>
        <h3 style="color:white">Movie Review - Edit</h3>
        <form method="post" action="doEdit.php">
            <label style="color:white">Review:</label>
            <textarea rows="5" cols="30" 
              name="details"><?php echo $row['review'] ?>
            </textarea> 
            
            <label style="color:white">Rating:</label>
            <textarea rows="2" cols="15" 
              name="rate"><?php echo $row['rating'] ?>
            </textarea> 
            
            <label style="color:white">date posted:</label>
            <textarea rows="5" cols="30" 
              name="date"><?php echo $row['datePosted'] ?>
            </textarea> 
            

            <input type="hidden" name="id" value="<?php echo $row['reviewId']; ?>"/>
            <input type="submit" value="Update Item"/>
        </form>
    </body>
</html
