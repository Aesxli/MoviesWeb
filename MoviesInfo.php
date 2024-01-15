<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$link = mysqli_connect($host, $username, $password, $db);
$Movieids = $_GET['id'];
$queryMovies = "SELECT * From movies WHERE movieId='$Movieids'";
$resultMovies = mysqli_query($link, $queryMovies);
$row = mysqli_fetch_array($resultMovies);
session_start();
//while ($row = mysqli_fetch_assoc($resultMovies)) {
    $arrResult[] = $row;
    
    $Img = $row['picture'];
    $Title = $row['movieTitle'];
    $Genre = $row['movieGenre'];
    $Duration = $row['runningTime'];
    $Language = $row['language'];
    $Director = $row['director'];
    $Cast = $row['cast'];
    $Synopsis = $row['synopsis'];
//}
mysqli_close($link);
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="stylesheets/Movies.css" rel="stylesheet" type="text/css"/>
        <style>
 
            .card-title{
                font-size: 7em;
            }
            .card-text, .card-title{
                color:white;
            }
            .container .box {
  width: 20em;
  height: 42em;
  padding: 1rem;
}
        </style>
    </head>
    <body style="background: #22272a">
        <div><?php include "navbar.php" ?></div>
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-4 container" style="width:42em">
                    <div class="card mt-5 box">
                        <div class="card-body">
                            <div class="col-md-12 ">
                                <h4 class="card-title"><?php echo $row['movieTitle']; ?></h4>
                                <p class="card-text" ><b>Movie Genre:</b><?php echo $Genre; ?></p>
                                <p class="card-text" ><b>Duration:</b><?php echo $Duration; ?></p>
                                <p class="card-text" ><b>Language:</b><?php echo $Language; ?></p>
                                <p class="card-text" ><b>Director:</b><?php echo $Director; ?></p>
                                <p class="card-text" ><b>Cast:</b><?php echo $Cast; ?></p>
                                <p class="card-text" ><?php echo $Synopsis; ?></p>
                            </div>
                            <div class="col-md-12" style="margin-bottom: 25px; margin-top: 25px">
                                <a href="Reviews.php?id=<?php echo $Movieids ?>" class="btn btn-primary">Reviews</a>
                            </div>
                            <?php
                            echo '<img src="Images/' . $Img . '"class="card-img-bottom" alt="Image">'
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>