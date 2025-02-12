<?php
 include'header.php';
 session_start();
?>
<?php
  include'admin/include/connection.php';
  error_reporting(0);
  $id = $_SESSION["id"];
  $query = "select * from portfolio where client_id='$id'";
  $data = mysqli_query($con,$query);
  $total = mysqli_num_rows($data);

  //echo $total;
  if($total !=0)
  {
    ?>
    <table border=3px class="table table-hover text-center justify-content-center" width="100%"> 
      <tr>

        <th style="  background-color:#CBC3E3;">stock name</th>
        <th style="  background-color:#CBC3E3;">stock price</th>
        <th style="  background-color:#CBC3E3;">qty</th>
        <th style="  background-color:#CBC3E3;">amount</th>  
        <th style="  background-color:#CBC3E3;"></th>  
      </tr>

      <?php
      while($result=mysqli_fetch_assoc($data))
      {
        echo "<tr>
                  <td>".$result['stock']."</td>
                  <td>".$result['price']."</td>
                  <td>".$result['sqty']."</td>
                  <td>".$result['amount']."</td>
                  <td> <a href='?id=$result[id]' class='btn btn-danger' >sell</a> </td>
              </tr>";
      }
   
  }
  else
  {
     echo "No recordes!!";
  }
  ?>
  </table>

  <?php
 include 'include/connection.php';
 $id=$_GET['id'];
 {
 $sql = "delete from portfolio
  where id='$id'";
    if(mysqli_query($con,$sql))
    {
    
    }
    else{
    echo"error";
        }
 }
?>