<?php
session_start();
// php file that contains the common database connection code
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";
$link = mysqli_connect($host, $username, $password, $db);
$Movieids = $_GET['id'];
$queryItems = "SELECT *
            FROM reviews WHERE movieId = $Movieids";

$resultItems = mysqli_query($link, $queryItems) or
        die(mysqli_error($link));

while ($row = mysqli_fetch_assoc($resultItems)) {
    $arrItems[] = $row;
}
mysqli_close($link);
?>
<!DOCTYPE html>
<style>
    th {color: white}
    </style>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Movie Review</title>
    </head>
    <body style="background: #22272a">
        <div><?php include "navbar.php" ?></div>
        <?php
        if(isset($_SESSION['user_id'])){
            ?>
        <p><a href="Add.php?id=<?php echo $Movieids ?> ">Add a Review</a></p>
        <?php
        }else{
            ?>
       <?php 
        }
        ?>
        <div style="color:white">
        <?php
        if(empty($arrItems)){
            
            echo 'No review';
        }else{
        ?>
        </div>
        <table class="box-table">
            <tr>
                <th>Review</th>
                <th>rating</th>
                <th>Date posted</th>
                
                <?php
                if(isset($_SESSION['user_id'])){
                        ?>
                <th>Delete</th>
                
                <th>Edit</th>
                <?php
                    }
               
                ?>
            </tr>
            <?php
            for ($i = 0; $i < count($arrItems); $i++) {
                $reID = $arrItems[$i]['reviewId'];
                $review = $arrItems[$i]['review'];
                $rating = $arrItems[$i]['rating'];
                $userID = $arrItems[$i]['userId'];
                $DP = $arrItems[$i]['datePosted'];
                //if('movie_id'==$Movieids){
                ?>
                <tr>
                    <td style="color: white"><?php echo $review; ?></td>
                    <td style="color: white"><?php echo $rating; ?></td>
                    <td style="color: white"><?php echo $DP; ?></td>
              
                    <?php
                
                    if(isset($_SESSION['user_id'])){
                      
                    ?>
                    
                    <?php
                        
                            if($_SESSION['user_id']==$userID){
                            ?>
                    <td>
                        <form method="post" action="doDelete.php">
                            <input type="hidden" name="reviewId" value="<?php echo $reID;?>"/>
                            <input type="submit" value="Delete"/>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="edit.php">
                            <input type="hidden" name="reviewId" value="<?php echo $reID;?>"/>
                            <input type="submit" value="Edit"/>
                        </form>
                    </td>
                    <?php
                            }else{
                                ?>
                   
                    <td> </td>
                    <?php
                            }
                        }
            
                    }
                    }
                    ?>
                </tr>
          
        </table>
    </body>
</html>
