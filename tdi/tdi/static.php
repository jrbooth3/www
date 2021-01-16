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
$staticmileage = $_POST['staticmileage'];
$vehicleid = $_POST['vehicleid'];
$staticquery = "INSERT INTO staticint (staticitem, staticmileage, statowner, vehicle_id) VALUES('$staticitem','$staticmileage', '$userid', '$vehicleid' )";
mysqli_query($conprd, $staticquery) or die('insert failed');
echo "New MySQL record added<br>";
print "<p><a href=\"static.php\">add another record? </a></p>";
print "<p><a href=\"index.php\">done? </a></p>";
mysql_close($conprd);
}
else
{
?>
<form method="post">
<?php
include 'config.php';
?>

<table width="900" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">staticitem</td>
<td><input name="staticitem" type="text" id="staticitem"></td>
<td width="50">staticmileage</td>
<td><input name="staticmileage" type="text" id="staticmileage"></td>
<td>vehicle</td>
<td>
<select name="vehicleid" size="1">
<?php
include 'vehicleSelect.php';
?>
</td>
<td width="50">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="100">&nbsp;</td>
<td><input name="add" type="submit" id="add" value="Add new record"></td>
</tr>
</table>
</form>
<table width="780"  border="2" cellpadding="2">
  <tr>
    <td>Mileage</td>
    <td>Item</td>
</tr>
<?php

include 'opendb.php';
$result = mysqli_query($conprd, "SELECT * FROM tdi.staticint
WHERE tdi.staticint.statowner = '$userid'");
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
print "<td>". number_format ($row{'staticmileage'}). "</td>" ;
print "  ";
print "<td>". ucwords ($row{'staticitem'}). "</td>". "</tr>" ;
}
	
mysqli_close($conprd);

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
