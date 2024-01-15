<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="Movies.php" style="padding-bottom: 20px">Movie Review</a>
        <h1 style="color: white;"> <?php
if(isset($_SESSION['user_id'])){
    echo"<i >Welcome ".$_SESSION['username'];
}?>
    </h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      </ul>
        <ul class="navbar-nav" style="padding-bottom: 20px">
            <li class="nav-item">
            <a class="nav-link" href="Movies.php">Movies</a>
        </li>
        <?php
        if(isset($_SESSION['user_id']))
        {
            ?>
            <li class="nav-item">
          <a class="nav-link" href="Logout.php">Logout</a>
        </li>
            
        <?php
        }
        ?>
        <?php
        if(!isset($_SESSION['user_id']))
        { 
            ?>
           <li class="nav-item">
          <a class="nav-link" href="Registration.php">Login/Register</a>
        </li>
        <?php
        }
        ?>
        </ul>
        <form class="d-flex" method="post" action="DoSearchMovies.php">
            <input class="form-control me-2" name="search_movie" type="text" placeholder="Search For Movie">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    
  </div>
</nav>
        
        </div>
    

</body>
</html>


