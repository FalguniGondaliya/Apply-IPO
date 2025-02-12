<?php
include'connection.php';
session_start();
$id=$_GET['id'];
$query="select * from addstock where id='$id'";
$data=mysqli_query($con,$query);
echo $_SESSION["id"];
$total=mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="container">
    <div class="login form">
<form method="POST" enctype="multipart/form-data">

    <label for="sname">Stock Name:</label>
    <input type="text" value="<?php echo $result['stock'];?>" name="stock" placeholder="stock name" required><br><br>

    <label for="sprice">Stock Price:</label>
    <input type="text" id="p" value="<?php echo $result['price'];?>" name="price" placeholder="stock price" required><br><br>

    <label for="sqty">Stock Qty:</label>
    <input type="text" id="qty"  name="sqty" placeholder="Enter Qty" required oninput="mul()"><br><br>

    <label for="rm">Req. Margin:</label>
    <label for="total" id="tot"></label><br>

    <input type="hidden" id="tot1" name="total">    
    
    <input type="submit" name="submit" class="button" value="Buy">
    

</form>
</div>
    </div>
<script src="JS/index.js"></script>
</body>
</html>

<?php
include 'connection.php';
if(isset($_POST['submit']))
{
$stock=$_POST['stock'];
$price=$_POST['price'];
$sqty=$_POST['sqty'];
$amount=$_POST['total'];
$id = $_SESSION["id"];
$sql = "insert into portfolio(client_id,stock,price,sqty,amount) values ('$id','$stock','$price','$sqty','$amount')";
if(mysqli_query($con,$sql))
{
    header("location:portfolio.php");
}
else{
    echo"error";
}
 }
?>

