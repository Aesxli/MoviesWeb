<?php
$UN = $_POST['UN'];
$Upass = $_POST['pass'];
$DOB = $_POST['DOB'];
$Email = $_POST['Email'];
$N=$_POST['Name'];
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$link = mysqli_connect($host, $username, $password, $db);


//FILL IN BLANK D
$query="INSERT INTO users(username,password,name,dob,email) VALUES('$UN',SHA1('$Upass'),'$N','$DOB','$Email')";
$result=mysqli_query($link, $query) or die('Error querying database');
//END BLANK d



$message = "";
if ($result) {
    $message .= "Usename: " . $UN . "<br/>";
    $message .= "Password: " . $Upass . "<br/>";
    $message .= "Name: " . $N . "<br/>";
    $message .= "Date Of Birth: " . $DOB . "<br/>";
    $message .="Email: ".$Email."<br/><br/>";
    $message .= "<b>Registration Successfully!</b>";
    $message .= "<p><a href='Login.php'>Login Now</a></p>";
} else {
    $message = "Registration Failed";
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="stylesheets/Register.css" rel="stylesheet">
    </head>
    <body style="background: #22272a">
        <div><?php include "navbar.php" ?></div>
        
        <div class="login-box" style="color:white"> 
            <?php echo $message; ?>
        </div>
    </body>
</html>
