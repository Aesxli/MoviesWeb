<!doctype html>
<html>
<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="stylesheets/Register.css" rel="stylesheet" type="text/css"/>
</head>
<body style="background: #22272a;">
    <div><?php include "navbar.php" ?></div>
    
    
    <div class="login-box" style="margin-top: 200px; height: 800px">
    <h2>Register</h2>
    <form method="post" action="doRegister.php">
      <div class="user-box">
          <input type="text" id="UN" name="UN" required style=" padding-top:30px" placeholder="Enter Username">
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="password" id="pass" name="pass" required style=" padding-top:30px" placeholder="Enter Password">
        <label>Password</label>
      </div>
        <div class="user-box">
        <input type="text" id="Name" name="Name" required style=" padding-top:30px" placeholder="Enter Name">
        <label>Name</label>
      </div>
      <div class="user-box">
          <label>Show Password</label>
          <input type="checkbox" onclick="myFunction()">
          
      </div>
        <div class="user-box">
            <input type="date" id="DOB" name="DOB" style=" padding-top:30px;" required >
        <label>Date Of Birth</label>
      </div>
        <div class="user-box">
          <input type="email" id="Email" name="Email" required style=" padding-top:30px" placeholder="Enter Email">
        <label>Email</label>
        </div>
        <div style="color: #fff"><b>Already Have an Account?</b><a href="Login.php">Login</a></div>
        <section>
        <a>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <button class="btn " type="submit" style="color:white">Submit</button>
        </a>
        </section>
    </form>
  </div>
    <script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>

