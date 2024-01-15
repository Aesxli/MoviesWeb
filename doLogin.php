<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$link = mysqli_connect($host, $username, $password, $db) or 
        die(mysqli_connect_error());

$entered_username=$_POST['UN'];
$entered_password=$_POST['pass'];

$msg="";
$queryCheck="SELECT * FROM users
        WHERE username='$entered_username'
        AND password = SHA1('$entered_password')";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));
if (mysqli_num_rows($resultCheck) == 1) 
{
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['user_id'] = $row['userId'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['name']= $row['name'];
    $_SESSION['dob']= $row['dob'];
  
    
    $msg = "<p><i>Welcome ". $_SESSION['username'] . "</p>";
    $msg .= "<p><a href='Movies.php'>Home</a></p>";
//    $msg = "<p> User is in the database </p>";
    
     if (isset($_POST['remember'])) {
        // Set the remember me cookie with the username
        setcookie('remember_me', $entered_username, time() + (30 * 24 * 60 * 60));
    }
} else 
{
    $msg = "<p>Sorry, you must have enter a valid usrname and password to log in</p>";
    $msg .= "<p><a href='login.php'>Go back to login page</a></p>";
//     $msg = "<p> User is not in the database </p>";
}
?>
<html style="background: #22272a;">
    <head>
    
    </head>
    <body style="color: white;text-align: center; font-size: 50px; ">
        <?php
        echo $msg;
        ?>
    </body>
</html>
