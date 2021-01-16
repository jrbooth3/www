<?php
// Connects to your Database 
include 'opendb.php';
//Checks if there is a login cookie
if(isset($_COOKIE['jetta_tdi']))
//Checks if there is a login cookie
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
$vehicle = $_POST['vehicle'];
include 'config.php';
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
$result = mysqli_query($conprd, "SELECT model, max(mileage), max(date), staticitem, vendor_name FROM maintenance, vehicle, staticint, vendors WHERE vehicle.vehicleid = maintenance.vehicle AND staticint.statid = maintenance.item AND maintenance.vendorid = vendors.vendorid AND vehicle.vehicleid = '$vehicle' GROUP BY staticitem, vendor_name");
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
print "<tr><td>". $row{'model'}. "</td>" ;
print "  ";
print "<td>". date ('n/j/Y' , strtotime($row{'max(date)'})) . "</td>" ;
print "  <td>". $row{'max(mileage)'}. "</td>";
print "  <td>". $row{'staticitem'}. "</td>";
print "  <td>". $row{'vendor_name'}. "</td>";
print "</tr>" ;
}
print "</table>";
//mysqli_close($con);
}
else
{
include 'config.php';
?>
<form method="post">
<table width="780" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">vehicle</td>
<td>
<select name="vehicle" size="1">
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
//include vehicleSelect.php;
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
