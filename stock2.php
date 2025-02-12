<?php
 include'header.php';
?>
<?php
  include'admin/include/connection.php';
  error_reporting(0);
  $query = "select * from addstock";
  $data = mysqli_query($con,$query);
  $total = mysqli_num_rows($data);

  //echo $total;
  if($total !=0)
  {
    ?>
    <table border=3px class="table table-hover text-center justify-content-center" width="100%"> 
      <tr>
        <th style="background-color:#CBC3E3;">stock name</th>
        <th style="background-color:#CBC3E3;">stock price</th>
        <th style="background-color:#CBC3E3;">symbol</th>
        <th style="background-color:#CBC3E3;"> </th>  
      </tr>

      <?php
      while($result=mysqli_fetch_assoc($data))
      {
        echo "<tr>
                  <td>".$result['stock']."</td>
                  <td>".$result['price']."</td>
                  <td><img src='admin/".$result['image']."' height='55px' width='100px'></td>
                  <td><a href='watchlist.php?id=$result[id]' class='btn btn-primary'>Buy</a></td>
              </tr>";
      }
   
  }
  else
  {
     echo "No recordes!!";
  }
  ?>
  </table>