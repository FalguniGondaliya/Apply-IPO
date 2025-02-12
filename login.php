<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  
  <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
  <div class="container">
    <div class="login form">
      <header>Sign In</header>
      <form method="POST" action="#">
        <input type="text" placeholder="Enter your username" name="username" required>

        <input type="password" placeholder="Enter your password" name="password" required>

        <input type="submit" name="signin" class="button" value="Sign In">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <a href="registration.php">SignUp</a>
        </span>
        <div class="signup">
        <span class="signup">Are you Admin?
         <a href="admin_login.php">Click Here</a>
        </span>
      </div>
    </div>
  </div>
</body>
</html>

<?php

include'connection.php';
if(isset($_POST['signin']))
{
  $query="SELECT * FROM client_login WHERE unm='$_POST[username]'AND pass='$_POST[password]'";
  $result=mysqli_query($con,$query);
  $row = mysqli_fetch_array($result);
  if(mysqli_num_rows($result)==1)
  {
    $_SESSION["id"] = $row["id"];
    header("location:index(2).php");
  }
  else
  {
    echo" Wrong Password !!!";
  }
}

?>