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
		$userid = $info['userid'];
		if ($pass != $info['user_password']) 
			{
header('Location: login.php');
			}

		else
			{
?>

<?php
if(isset($_POST['add']))
{
include 'config.php';
include 'opendb.php';

$vehicleid = $_POST['vehicleid'];

$checkmaintenance = mysqli_query($conprd,"SELECT * FROM maintenance, rawdata WHERE tdi.rawdata.vehicle = '$vehicleid' OR tdi.maintenance.vehicle = '$vehicleid'")or die(mysql_error());
$check3 = mysqli_num_rows($checkmaintenance);
$check3 = 0;
if ($check3 > 0) {
		die('Vehicle data exists in fuel and or maintenance. Please remove all fuel and maintenance entries first. <a href=index.php>Click Here to return to home</a>');
				}
include 'opendb.php';
$querya ="DELETE FROM tdi.rawdata
WHERE tdi.rawdata.vehicle = '$vehicleid'";
mysqli_query($conprd, $querya) or die('rawdata delete failed');
echo "rawdata records deleted<br>";
$queryb = "DELETE FROM tdi.maintenance
WHERE tdi.maintenance.vehicle = '$vehicleid'";
mysqli_query($conprd, $queryb) or die('maintenance delete failed');
echo "maintenance records deleted<br>";
$query = "DELETE FROM vehicle
WHERE vehicleid = '$vehicleid'";
mysqli_query($conprd, $query) or die('vehicle delete failed');
echo "vehicle record deleted<br>";
print "<p><a href=\"vehicle-removal.php\">delete another vehicle? </a></p>";
mysql_close($con);

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
<td width="100">Vehicle ID</td>
<td>
<select name="vehicleid" size="1">
<?php
include 'opendb.php';
   $query = "SELECT vehicleid FROM tdi.vehicle, tdi.users
WHERE tdi.vehicle.owner = tdi.users.userid 
AND tdi.users.userid = '7'";
   $result = mysqli_query($conprd, $query);
     if(mysqli_num_rows($result)) {
       // we have at least one user, so show all users as options in select form
       while($row = mysqli_fetch_row($result))
       {
          print("<option value=\"$row[0]\">$row[0]</option>");
       }
     } else {
       print("<option value=\"\">No vehicle selected</option>");
     }
?>
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
</form>
<table width="500"  border="2" cellpadding="2">
  <tr>
    <td>ID</td>
    <td>year</td>
    <td>make</td>
    <td>model</td>
    <td>color</td>
    <td>vin</td>
</tr>
<?php

include 'opendb.php';
$result = mysqli_query($conprd, "SELECT vehicleid, year, make, model, color, vin FROM tdi.vehicle, tdi.users
WHERE tdi.vehicle.owner = tdi.users.userid AND tdi.users.userid = '$userid'");

while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
print "<td>". $row{'vehicleid'}. "</td>" ;
print "  ";
print "<td>". $row{'year'}. "</td>" ;
print "  ";
print "<td>". $row{'make'}. "</td>" ;
print "  ";
print "<td>". $row{'model'}. "</td>" ;
print "  ";
print "<td>". $row{'color'}. "</td>" ;
print "  ";
print "<td>". $row{'vin'}. "</td>". "</tr>" ;
}

mysqli_close($con);

?>

  </tr>
</table>
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

