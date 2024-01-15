<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";
$link = mysqli_connect($host, $username, $password, $db);
$items = "SELECT * FROM movies";
$result = mysqli_query($link, $items);



mysqli_close($link);
session_start();
while ($rowSelect = mysqli_fetch_assoc($result)) {
    $arrResult[] = $rowSelect;
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="stylesheets/Movies.css" rel="stylesheet">
    </head>
    <body style="background: #22272a">
        <div><?php include "navbar.php" ?></div>
        <style>
        h1 {text-align: center;}
        </style>
       <h1 style="size: 200px;color: white; font-family: sans-serif; "><b>Movies</b></h1>
        <div class="container-fluid ">
            <div class="row ">
                <?php
                for ($i = 0; $i < count($arrResult); $i++) {
                    $movieid = $arrResult[$i]['movieId']; //match according to movcieid with the index
                    ?>
                   
                    <div class="col-4 container" >
                        <div class="card mt-4 box" style="width:350px; height: 700px;">                            
                            <?php
                            echo '<img src="Images/' . $arrResult[$i]['picture'] . '"class="card-img" alt="img">'
                            ?>
                            <div class="card-body" style="height: 100px">
                                <h4 class="card-title" style="color: white"><?php echo $arrResult[$i]['movieTitle']; ?> </h4>
                                <p class="card-text" style="color: white; padding-bottom: 30px; font-size: 1.5em"><?php echo $arrResult[$i]['movieGenre']; ?></p>
                                <a href="MoviesInfo.php?id=<?php echo $arrResult[$i]['movieId'] ?> "class="btn btn-primary">See Profile</a>
                                
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>



