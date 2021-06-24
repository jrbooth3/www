<?php
// Connects to your Database 
$port = $_SERVER['SERVER_PORT'];
include 'opendb.php';
if ( $test == 1 ) {
echo "<font color=red>----------------TEST SYSTEM------------------</font>";
}
$today = date('Y/m/d', strtotime("Now"));
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
<html>
<head>
<title>Adding a vendor</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
if(isset($_POST['add']))
{
include 'opendb.php';

$vendor = $_POST['vendor'];
$tele = $_POST['tele'];
$address = $_POST['address'];
$contact = $_POST['contact'];

echo "$vendor, $tele, $address, $contact";
$query = "INSERT INTO tdi.vendors (vendor_name, tele, address, contact, owner) VALUES('$vendor', '$tele', '$address', '$contact', '$userid')";
mysqli_query($conprd, $query) or die('insert failed');
include 'config.php';
echo "New vendor added<br>";
print "<p><a href=\"vehicle.php\">add another vendor? </a></p>";
mysql_close($conprd);
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
<td width="100">Vendor</td>
<td><input name="vendor" type="text" id="vendor"></td>
</tr>
<tr>
<td width="100">Telephone</td>
<td><input name="tele" type="text" id="tele"></td>
</tr>
<tr>
<td width="100">address</td>
<td><input name="address" type="text" id="address"></td>
</tr>
<tr>
<td width="100">contact</td>
<td><input name="contact" type="text" id="contact"></td>
</tr>
<tr>
<td width="100">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="100">&nbsp;</td>
<td><input name="add" type="submit" id="add" value="Add new vendor"></td>
</tr>
</table>
</form>
<table width="780"  border="2" cellpadding="2">
  <tr>
    <td>vendor</td>
    <td>telephone</td>
    <td>address</td>
    <td>contact</td>
  </tr>
<?php

include 'opendb.php';
$result = mysqli_query($conprd, "SELECT * FROM tdi.vendors
WHERE tdi.vendors.owner = '$userid'");
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
print "<td>". $row{'vendor_name'}. "</td>" ;
print "  ";
print "<td>". $row{'tele'}. "</td>" ;
print "  ";
print "<td>". $row{'address'}. "</td>" ;
print "  ";
print "<td>". $row{'contact'}. "</td>" ;
print "  ";
print "</tr>" ;
}
	
//mysqli_close($conprd);

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
?>

