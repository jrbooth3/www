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

$staticitem = $_POST['staticitem'];

$query = "DELETE FROM staticint  WHERE statid = '$statid'";
mysqli_query($conprd, $query) or die('insert failed');
echo "New MySQL record added<br>";
include 'config.php';
print "<p><a href=\"static-removal.php\">delete another item? </a></p>";
print "<p><a href=\"config.php\">done? </a></p>";
print "<p><a href=\"index.html\">home? </a></p>";
print "<p><a href=\"static.php\">add another item? </a></p>";
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
<td width="100">item</td>
<td>
<select name="staticitem" size="1">
<?php
include 'opendb.php';
$selected = mysqli_select_db($conprd, "tdi");
   $query = "SELECT statid FROM tdi.staticint";
   $result = mysqli_query($conprd, $query);
     if(mysqli_num_rows($result)) {
       // we have at least one user, so show all users as options in select form
       while($row = mysqli_fetch_row($result))
       {
          print("<option value=\"$row[0]\">$row[0]</option>");
       }
     } else {
       print("<option value=\"\">No item selected</option>");
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
<td><input name="add" type="submit" id="add" value="delete item?"></td>
</tr>
</table>
</form>
<table width="300"  border="2" cellpadding="2">
  <tr>
    <td>Item</td>
    <td>Mileage</td>
    <td>Date</td>
    <td>vehicle</td>
</tr>
<?php

include 'opendb.php';
$result = mysqli_query($conprd, "SELECT staticint.statid, staticint.staticitem,staticint.staticmileage, vehicle.model FROM tdi.staticint LEFT JOIN vehicle ON (staticint.vehicle_id = vehicle.vehicleid) order by statid;");
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
print "<td>". $row{'statid'}. "</td>" ;
print "  ";
print "<td>". $row{'staticitem'}. "</td>" ;
print "  ";
print "<td>". $row{'staticmileage'}. "</td>";
print "<td>". $row{'model'}. "</td> </tr>" ;
}
?>

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

