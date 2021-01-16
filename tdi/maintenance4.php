<?php
// Connects to your Database 
include 'opendb.php';
//Checks if there is a login cookie
if(isset($_COOKIE['jetta_tdi']))
//if there is, it logs you in and directes you to the members page
{ 
	$username = $_COOKIE['jetta_tdi']; 
	$pass = $_COOKIE['Key_jetta_tdi'];
	
	$check = mysqli_query($conprd, "SELECT * FROM users WHERE username = '$username'");

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
//$item = $_POST['item'];
//$mileage = $_POST['mileage'];
//$date = strtotime($_POST['date']);
//$date = date('Y-m-d', $date);
$vehicle = $_POST['vehicle'];
include 'config.php';
print "<table width=\"780\" border=\"1\" cellspacing=\"1\" cellpadding=\"2\">";
print "<tr>";
print "<td>Car</td>";
print "<td>Date</td>";
print "<td>Mileage</td>";
print "<td>Maintenance Item</td>";
print "<td>Vendor</td>";
print "<td>Parts</td>";
print "<td>Labor</td>";
print "<td>Hours</td>";
print "</tr>";

$prevmileage = "0";
include 'opendb.php';
$result = mysqli_query($conprd, "SELECT model, mileage, date, staticitem, parts, labor, hours, vendor_name
FROM maintenance, vehicle, staticint, vendors
WHERE vehicle.vehicleid = maintenance.vehicle AND staticint.statid = maintenance.item AND maintenance.vendorid = vendors.vendorid AND vehicle.vehicleid = '$vehicle' order by -mileage desc");
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

print "<tr><td>". $row{'model'}. "</td>" ;
print "  ";
print "<td>". date ('n/j/Y' , strtotime($row{'date'})) . "</td>" ;
print "  <td>". $row{'mileage'}. "</td>";
print "  <td>". $row{'staticitem'}. "</td>";
print "  <td>". $row{'vendor_name'}. "</td>";
print "  <td>$". $row{'parts'}. "</td>";
print "  <td>$". $row{'labor'}. "</td>";
print "  <td>". $row{'hours'}. "</td>";
print "</tr>" ;
}
mysqli_close($conprd);

include 'opendb.php';
$result = mysqli_query($conprd, "SELECT model, sum(parts), sum(labor), sum(hours)
FROM maintenance, vehicle
WHERE vehicle.vehicleid = maintenance.vehicle AND vehicle.vehicleid = '$vehicle'
group by model;");
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

print "<tr><td>". $row{'model'}. "</td>" ;
print "<td> </td>";
print "<td> </td>";
print "<td> </td>";
print "<td> Totals </td>";
print "  <td>$". $row{'sum(parts)'}. "</td>";
print "  <td>". $row{'sum(labor)'}. "</td>";
print "  <td>". $row{'sum(hours)'}. "</td>";
print "</tr>" ;
}
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

</table>
