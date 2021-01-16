<?php
include 'config.php';
?>
<table width="780" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">Vehicle ID</td>
<td>
<select name="vehicleid" size="1">
<script language="php">
$username = "jimbo";
$password = "jones";
$hostname = "localhost";
$dbh = mysql_connect($hostname, $username, $password);
$selected = mysql_select_db("tdi",$dbh);
   $query = "SELECT vehicleid FROM tdi.vehicle, tdi.users
WHERE tdi.vehicle.owner = tdi.users.userid 
AND tdi.users.userid = '7'";
   $result = mysql_query($query, $dbh);
     if(mysql_num_rows($result)) {
       // we have at least one user, so show all users as options in select form
       while($row = mysql_fetch_row($result))
       {
          print("<option value=\"$row[0]\">$row[0]</option>");
       }
     } else {
       print("<option value=\"\">No vehicle selected</option>");
     }
mysql_close($dbh);
</script>

</td>
</tr>
<tr>
<td width="100">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="100">&nbsp;</td>
<td><input name="add" type="submit" id="add" value="delete record"></td>
</tr>
</table>
