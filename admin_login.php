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
      <header>Admin Sign In</header>
      <form method="POST" action="#">
        <input type="text" placeholder="Enter your username" name="username" required>

        <input type="password" placeholder="Enter your password" name="password" required>

        <input type="submit" name="signin" class="button" value="Sign In">
      </form>
    </div>
  </div>
</body>
</html>

<?php

include'connection.php';
if(isset($_POST['signin']))
{
  $query="SELECT * FROM admin_login WHERE unm='$_POST[username]'AND pass='$_POST[password]'";
  $result=mysqli_query($con,$query);
  if(mysqli_num_rows($result)==1)
  {
    header("location:admin/index.php");
  }
  else
  {
    echo" Wrong Password !!!";
  }
}

?>