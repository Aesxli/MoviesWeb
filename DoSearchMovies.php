<?php
$search = $_POST['search_movie'];
$message = "";
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$link = mysqli_connect($host, $username, $password, $db);
$querySelect = "SELECT *
                FROM movies
                WHERE movieTitle LIKE '%$search%'
                GROUP BY movieTitle ORDER BY movieTitle";
$resultSelect = mysqli_query($link, $querySelect) or die ("Error in query: $querySelect. " . mysqli_error($link));

$arrResult = array();

while ($rowSelect = mysqli_fetch_assoc($resultSelect)) {
    $arrResult[] = $rowSelect;
}

mysqli_close($link);
include "navbar.php"
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="stylesheets/Movies.css" rel="stylesheet">

    </head>
    <body style="background: #22272a">
        <?php
           if (!empty($arrResult)) {
           ?>    
            <?php
                for ($j = 0; $j < count($arrResult); $j++) {
                    $movieid = $arrResult[$j]['movieId'];
                ?>
        <h1 style="color: white; font: sans-serif;text-transform: uppercase;">Results for: <?php echo $search; ?></h1>
                    <div class="col-4 container" >
                        <div class="card mt-4 box" style="width:350px; height: 700px;">                            
                            <?php
                            echo '<img src="Images/' . $arrResult[$j]['picture'] . '"class="card-img" alt="img">'
                            ?>
                            <div class="card-body" style="height: 100px">
                                <h4 class="card-title" style="color: white"><?php echo $arrResult[$j]['movieTitle']; ?> </h4>
                                <p class="card-text" style="color: white; padding-bottom: 30px; font-size: 1.5em"><?php echo $arrResult[$j]['movieGenre']; ?></p>
                                <a href="MoviesInfo.php?id=<?php echo $arrResult[$j]['movieId'] ?> "class="btn btn-primary">See Profile</a>
                                
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                $message .= "No Movies Found";
                echo $message;
            }
            ?>
    </body>
    
</html>
