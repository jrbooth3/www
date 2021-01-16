<?php
include 'opendb.php';
  $query = "SELECT model, vehicleid FROM vehicle WHERE vehicle.owner = '$userid' ";
   $result = mysqli_query($conprd, $query);
       // we have at least one user, so show all users as options in select form
       while($row = mysqli_fetch_row($result))
       {
       echo "<option value=" .$row[1]. ">" .$row[0]. "</option>";
       }
mysqli_close($conprd);
?>
