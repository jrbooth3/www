<?php
// Connects to your Database 
include 'opendb.php';
//Checks if there is a login cookie
if(isset($_COOKIE["jetta_tdi"]))
//if there is, it logs you in and directes you to the members page
{ 
	$username = $_COOKIE["jetta_tdi"]; 
	$pass = $_COOKIE["Key_jetta_tdi"];
	
	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());

	while($info = mysql_fetch_array( $check )) 	
		{

		if ($pass != $info['user_password']) 
			{
header('Location: login.php');
			}

		else
			{$userid = $info['userid']
?>
  
<?php
if(isset($_POST['add']))
{
include 'opendb.php';
$vehicle = $_POST['vehicle'];
include 'controls.php';
?>
<table width=\"780\" border=\"1\" cellspacing=\"1\" cellpadding=\"2\">
<tr>
<td>Car</td>
<td>Date</td>
<td>Mileage</td>
<td>Maintenance Item</td>
<td>Vendor</td>
</tr>
<?php
$prevmileage = "0";
include 'opendb.php';
$result = mysql_query("SELECT model, max(mileage), max(date), staticitem, vendor_name
FROM tdi.maintenance, tdi.vehicle, tdi.staticint, tdi.vendors
WHERE tdi.vehicle.vehicleid = tdi.maintenance.vehicle AND tdi.staticint.statid = tdi.maintenance.item AND tdi.maintenance.vendorid = tdi.vendors.vendorid AND tdi.vehicle.vehicleid = '$vehicle'
GROUP BY staticitem, vendor_name ");
while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {

print "<tr><td>". $row{'model'}. "</td>" ;
print "  ";
print "<td>". date ('n/j/Y' , strtotime($row{'max(date)'})) . "</td>" ;
print "  <td>". $row{'max(mileage)'}. "</td>";
print "  <td>". $row{'staticitem'}. "</td>";
print "  <td>". $row{'vendor_name'}. "</td>";
print "</tr>" ;
}
print "</table>";
mysql_close($dbh);
}
else
{
?>
<form method="post">
<table width="780" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">vehicle</td>
<td>
<select name="vehicle" size="1">
<script language="php">
include 'opendb.php';
   $query = "SELECT model, vehicleid FROM tdi.vehicle
		WHERE tdi.vehicle.owner = '$userid' ";
   $result = mysql_query($query, $dbh);
     if(mysql_num_rows($result)) {
       // we have at least one user, so show all users as options in select form
       while($row = mysql_fetch_row($result))
       {
          print("<option value=\"$row[1]\">$row[0]</option>");
       }
     } else {
       print("<option value=\"\">No item selected</option>");
     }
mysql_close($dbh);
</script>
</td>
</tr>
<tr>
<td width="100">&nbsp;</td>
<td><input name="add" type="submit" id="add" value="view results"></td>
</tr>
</table>
</form>
<?php
}
?>
<?php
			}

		}

}
else
	{
	header('Location: login.php');
	}
?>
