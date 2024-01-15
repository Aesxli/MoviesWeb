<?php 
session_start(); 
//if (!isset($_SESSION['user_id'])) { 
//    header("location: login.php"); // auto redirect to login.php 
//} 
 
$userID = $_SESSION['user_id']; 
$movieId = $_POST['movieId']; 
// php file that contains the common database connection code 
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";
$link = mysqli_connect($host, $username, $password, $db);
 
if (!empty($_POST['username']) && !empty($_POST['comment']) && !empty($_POST['rating'])) { 
    //TODO: Assign data retreived from form to the following variables $itemName, $itemDesc, $itemPrice  respectively 
    $username = $_POST['username']; 
    $comment = $_POST['comment']; 
    $rating = $_POST['rating']; 
    $currentDateTime = new DateTime('now'); 
    $currentDate = $currentDateTime->format('Y-m-d'); 
//    echo $currentDate; 
 
//     $userId = $_SESSION['userid']; 
    $sql = "INSERT INTO reviews (movieId, userId,review, rating, datePosted)  
            VALUES ($movieId,$userID,'$comment',$rating, '$currentDate')"; 
 
    //TODO: Execute the SQL statement  
    $status = mysqli_query($link, $sql) or die('Error querying database'); 
 
    if ($status) { 
        $message = "Item posted successfully."; 
    } else { 
        $message = "Item post failed."; 
    } 
} else { 
    $message = "All Item details have to be provided."; 
} 
 
//TODO: Close the Database conection  
mysqli_close($link); 
?> 
<html> 
    <head> 
        <meta charset="UTF-8"> 
        
        <title></title> 
    </head> 
    <body style="background: #22272a"> 
        <?php include "Navbar.php" ?> 
        <div class="container mt-3 " > 
            <h1 style="text-align: center;color: white">Review Added</h1> 
            <div style="text-align: center;color: white">
            <b>Comment:</b><br> 
            <?php echo $comment?><br>
            </div>
            <div style="text-align: center;color: white">
            <b>Rating:</b><br> 
            <?php echo $rating?><br> 
            </div>
            <div style="text-align: center;color: white">
            <b>Date:</b><br> 
           <?php echo $currentDate?> 
            </div>
             <p style="text-align: center; margin-top: 25px; color: white"><a href="Reviews.php?id=<?php echo $movieId?>">Back</a> to review page</p> 
        </div> 
 
        
 
    </body> 
</html>

