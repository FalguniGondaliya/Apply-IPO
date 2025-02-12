<?php
 include'header.php';
?>

<?php
  include'admin/include/connection.php';
  error_reporting(0);
  $query = "select * from addipo";
  $data = mysqli_query($con,$query);
  $total = mysqli_num_rows($data);
  
  if($total !=0)
  {
    ?>

    <table border=3px class="table table-hover text-center justify-content-center" width="100%">
      <tr>
        <th style="background-color:#CBC3E3">Symbol</th>
        <th style="background-color:#CBC3E3">Ipo name</th>
        <th style="background-color:#CBC3E3">Listing date</th>
        <th style="background-color:#CBC3E3">Price range</th>
        <th style="background-color:#CBC3E3">qty</th>
        <th style="background-color:#CBC3E3">Investment</th>
        <th style="background-color:#CBC3E3"></th>
      </tr>

      <?php
      while($result=mysqli_fetch_assoc($data))
      {
        echo "<tr>
                  
                  <td><img src='admin/".$result['image']."' height='55px' width='100px'></td>
                  <td>".$result['iname']."</td>
                  <td>".$result['date']."</td>
                  <td>".$result['iprice']."</td>
                  <td>".$result['sqty']."</td>
                  <td>".$result['inv']."</td>
                  <td><a href='applyipo.php?id=$result[id]' class='btn btn-primary'>Apply</a></td>
              </tr>";
      }
   
  }
  else
  {
     echo "No recordes!!";
  }
  ?>
  </table>

  