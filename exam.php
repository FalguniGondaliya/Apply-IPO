<?php
include 'connection.php';
session_start();
$id = $_GET['id'];
$query = "select * from addipo where id='$id'";
$data = mysqli_query($con, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

// Include the QR code library
require_once 'D:\xampp\htdocs\Apply IPO\qrlib.php'; // Replace with your actual path

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
      <input type="text" value="<?php echo $result['iname']; ?>" name="stock" placeholder="ipo name" required><br><br>

      <label for="sname">Pan No:</label>
      <input type="text" name="pan" placeholder="Pan No" required="charset"><br><br>

      <label for="sprice">Upi Id:</label>
      <input type="email" name="upi" placeholder="Upi ID" required><br><br>

      <input type="submit" name="submit" class="button" value="apply">
    </form>
  </div>
</div>

<?php
if (isset($_POST['submit'])) {
  $i = $_POST['stock'];
  $p = $_POST['pan'];
  $u = $_POST['upi'];

  $sql = "insert into ipo_apply(iname,pan_no,upi_id) values ('$i','$p','$u')";

  if (mysqli_query($con, $sql)) {
    header("location:invest.php"); // Redirect after successful application

    // Generate QR code data dynamically
    $qrCodeData = "$i\n$p\n$u";

    // Create QR code object
    $qr = new QRCode($qrCodeData);

    // Optional QR code settings (adjust as needed)
    $qr->setSize(5);
    $qr->setPadding(10);

    // Generate the QR code image
    $qr->generateImage();

    // **Important:** Temporarily store the image in memory
    ob_start();
    imagepng($qr->getImageResource());
    $qrImage = ob_get_clean(); // Get image data as a string

    // Display the QR code image on success page (invest.php)
    // Assuming you have a container element with ID "qr-container" on invest.php
    echo '<script>window.onload = function() {';
    echo '  document.getElementById("qr-container").innerHTML = "<img src=\'data:image/png;base64,' . base64_encode($qrImage) . '\' alt=\'Dynamic QR Code\'>";';
    echo '}</script>'; // Inject JavaScript to display the image

  } else {
    echo "Error: " . mysqli_error($con);
  }
}

?>

</body>
</html>
