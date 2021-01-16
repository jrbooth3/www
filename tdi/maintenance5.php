<?php
// Connects to your Database 
include 'opendb.php';
//Checks if there is a login cookie
if(isset($_COOKIE['jetta_tdi']))
//if there is, it logs you in and directes you to the members page
{ 
	$username = $_COOKIE['jetta_tdi']; 
	$pass = $_COOKIE['Key_jetta_tdi'];

	$check = mysqli_query($conprd, "SELECT * FROM users WHERE username = '$username'")or die(mysql_error());

	while($info = mysqli_fetch_array( $check )) 	
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
include 'config.php';
print "<table width=\"780\" border=\"1\" cellspacing=\"1\" cellpadding=\"2\">";
print "<tr>";
print "<td>Car</td>";
print "<td>Date</td>";
print "<td>Mileage</td>";
print "<td>Maintenance Item</td>";
print "<td>Vendor</td>";
print "<td>Total Parts</td>";
print "<td>Total Hours</td>";
print "<td>Total Labor</td>";
print "</tr>";

$prevmileage = "0";
include 'opendb.php';
$result = mysqli_query($conprd, "SELECT model, max(mileage), max(date), staticitem, vendor_name, sum(parts), sum(hours), sum(labor)
FROM tdi.maintenance, tdi.vehicle, tdi.staticint, tdi.vendors
WHERE tdi.vehicle.vehicleid = tdi.maintenance.vehicle AND tdi.staticint.statid = tdi.maintenance.item AND tdi.maintenance.vendorid = tdi.vendors.vendorid AND tdi.vehicle.vehicleid = '$vehicle'
GROUP BY staticitem  order by date");
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

print "<tr><td>". $row{'model'}. "</td>" ;
print "  ";
print "<td>". date ('n/j/Y' , strtotime($row{'max(date)'})) . "</td>" ;
print "  <td>". $row{'max(mileage)'}. "</td>";
print "  <td>". $row{'staticitem'}. "</td>";
print "  <td>". $row{'vendor_name'}. "</td>";
print "  <td>$". $row{'sum(parts)'}. "</td>";
print "  <td>". $row{'sum(hours)'}. "</td>";
print "  <td>$". $row{'sum(labor)'}. "</td>";
print "</tr>" ;
}
print "</table>";
mysqli_close($conprd);
}
else
{
?>
<form method="post">
<?php
include 'config.php';
?>
<table width="780" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">vehicle</td>
<td>
<select name="vehicle" size="1">
<?php
include 'vehicleSelect.php';
?>
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
