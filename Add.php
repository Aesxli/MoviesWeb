<?php
session_start();
$Movieids = $_GET['id'];
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";
$link = mysqli_connect($host, $username, $password, $db);
$queryMovies = "SELECT * From movies WHERE movieId='$Movieids'";
$result=mysqli_query($link,$queryMovies)or die(mysqli_error($link));
while($row=mysqli_fetch_array($result)){
    $movieTitle=$row['movieTitle'];
    $Movieid=$row['movieId'];
    $arrContent=$row;
}
?>
<style>
    label{color: white}
</style>
<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title></title> 
    </head> 
    <body style="background: #22272a"> 
       
        <?php include "navbar.php" ?> 
        <div class="container mt-3 "> 
            <form method="post" action="DoAdd.php"> 
                <input type="hidden" name="movieId" value="<?php echo $Movieid?>"/> 
                <h1 style="text-align: center">Add a review for <?php echo $movieTitle?> </h1> 
                 
               
                <label for="username" class="form-label">Username:</label> 
                 <?php if (isset($_SESSION['user_id'])){ 
                      
                   ?> 
                
                <input type="text" class="form-control" id="username" name="username"  value="<?php echo $_SESSION['username'] ?>"> 
                <?php  
                 }else{ 
                ?> 
                <input type="text" required class="form-control" id="username" name="username"> 
                <?php 
                 } 
                    ?> 
                 
                <div> 
                    <label for="comment">Comments:</label><br> 
                    <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea> 
                </div> 
                <div> 
                    <label for="rating">Rating:</label><br> 
                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required > 
                </div> 
 
 
                <div class="col-md-12 text-center"> 
                    <button type="submit" class="btn btn-primary" style="margin-top: 25px" >Submit Review</button> 
                </div> 
             
                <p style="text-align: center; margin-top: 5px; color: white" ><a href="Reviews.php?id=<?php echo $Movieids ?> " >Back</a> to review page</p> 
            </form> 
        </div> 
    </body> 
</html>