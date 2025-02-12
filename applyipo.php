<?php
include'connection.php';
session_start();
$id=$_GET['id'];
$query="select * from addipo where id='$id'";
$data=mysqli_query($con,$query);
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

<label for="sname">IPO Name:</label>
    <input type="text" value="<?php echo $result['iname'];?>" name="stock" placeholder="ipo name" required><br><br>

    <label for="sname">Pan No:</label>
    <input type="text" name="pan" placeholder="Pan No" required="charset"><br><br>

    <label for="sprice">Upi Id:</label>
    <input type="email" name="upi" placeholder="Upi ID" required><br><br>
    
    <input type="submit" name="submit" class="button" value="apply" onclick="myFunction()">
    <script>
function myFunction() {
  alert("successfully apply...!");
}
</script>

    
</form>
</div>
    </div>

</body>
</html>

<?php
include 'connection.php';


 include 'connection.php';
if(isset($_POST['submit']))
{
$i=$_POST['stock'];
$p=$_POST['pan'];
$u=$_POST['upi'];

$sql = "insert into ipo_apply(iname,pan_no,upi_id) values ('$i','$p','$u')";
if(mysqli_query($con,$sql))
{
    header("location:invest.php");
}
else{
    echo"error";
}
 }
?>
  

