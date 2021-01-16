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
$vendor = $_POST['vendor'];
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
include 'opendb.php';
$result = mysqli_query($conprd, "SELECT model, mileage, date, staticitem, parts, labor, hours, vendor_name
FROM tdi.maintenance, tdi.vehicle, tdi.staticint, tdi.vendors
WHERE tdi.vehicle.vehicleid = tdi.maintenance.vehicle
AND tdi.staticint.statid = tdi.maintenance.item
AND tdi.maintenance.vendorid = tdi.vendors.vendorid
AND tdi.vendors.vendorid = '$vendor' order by mileage");
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
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
include 'opendb.php';
$sql="SELECT sum(parts), sum(labor), sum(hours), model FROM tdi.maintenance, tdi.vendors WHERE tdi.vendors.vendorid = tdi.maintenance.vendorid AND tdi.vendors.vendorid = '$vendor' group by vendor_name";
$result = mysqli_query($conprd, $sql);
while ($row = mysqli_fetch_array($result)) {
print "<tr><td>". $row{'model'}. "</td>" ;
print "<td> </td>";
print "<td> </td>";
print "<td> </td>";
print "<td> Totals </td>";
print "  <td>$". $row{'sum(parts)'}. "</td>";
print "  <td>". $row{'sum(labor)'}. "</td>";
print "  <td>$". $row{'sum(hours)'}. "</td>";
print "</tr>" ;
}
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
<td width="100">vendor</td>
<td>
<select name="vendor" size="1">
<?php
include 'opendb.php';
   $query = "SELECT vendor_name, vendorid FROM tdi.vendors
		WHERE tdi.vendors.owner = '$userid' ";
   $result = mysqli_query($conprd, $query);
     if(mysqli_num_rows($result)) {
       // we have at least one user, so show all users as options in select form
       while($row = mysqli_fetch_row($result))
       {
          print("<option value=\"$row[1]\">$row[0]</option>");
       }
     } else {
       print("<option value=\"\">No item selected</option>");
     }
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
