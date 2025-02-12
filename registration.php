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
      <header>Registration Form</header>
      <form method="POST" action="#">
        <input type="text" name="fname" placeholder="Enter your name" required>

        <input type="email" name="email" placeholder="Enter your email" required>

		<input type="text" name="username" placeholder="Enter your username">

        <input type="password" name="password" placeholder="Enter your password">
       
            <input type="text" name="captcha" placeholder="Enter captcha">
          
          <div align="center"> <img src="capcha.php" style="margin-trim: 10" /></div>
          
        <input type="submit" name="signup" class="button" value="Signup" onclick="myFunction()">
        <script>
          function myFunction() 
          {
            alert("please fill valid information");
          }
        </script>

      </form>
    </div>
  </div>
  
</body>
</html>


<?php

//error_reporting(0);
if(isset($_POST['signup']))
{
	include("connection.php");
  
  $name=$_POST['fname'];
  $email=$_POST['email'];
  $uname=$_POST['username'];
  $pass=$_POST['password'];
  $cap=$_POST['captcha'];
  $sql="insert into client_login(fullname,email,unm,pass,captcha) values('$name','$email','$uname','$pass','$cap')";
  $result=mysqli_query($con,$sql);
   if($_SESSION['CODE']==$cap)
  {
  header("location:index(2).php");
  }
  else
  {
    echo "please enter valid captcha";
  }
}echo "<center><h1><Welcome></h1></center>";
?>