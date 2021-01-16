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
<body>
<?php
if(isset($_POST['add']))
{
echo "values year" . $year . ",make " .  $make . "model " . $model . "color " .  $color. "vin " .  $vin . "userid " . $userid . ""; 

include 'opendb.php';

$year = $_POST['year'];
$make = $_POST['make'];
$model = $_POST['model'];
$color = $_POST['color'];
$vin = $_POST['vin'];

echo "values year" . $year . ",make " .  $make . "model " . $model . "color " .  $color. "vin " .  $vin . "userid " . $userid . ""; 
$query = "INSERT INTO vehicle ( year, make, model, color, vin, owner) VALUES('$year','$make','$model','$color','$vin', '$userid' );";
mysqli_query($conprd, $query) or die('insert failed');
include 'config.php';
echo "New vehicle added<br>";
print "<p><a href=\"vehicle.php\">add another vehicle? </a></p>";
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
<td width="100">year</td>
<td><input name="year" type="text" id="year"></td>
</tr>
<tr>
<td width="100">make</td>
<td><input name="make" type="text" id="make"></td>
</tr>
<tr>
<td width="100">model</td>
<td><input name="model" type="text" id="model"></td>
</tr>
<tr>
<td width="100">color</td>
<td><input name="color" type="text" id="color"></td>
</tr>
<tr>
<td width="100">vin</td>
<td><input name="vin" type="text" id="vin"></td>
</tr>
<tr>
<td width="100">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="100">&nbsp;</td>
<td><input name="add" type="submit" id="add" value="Add new vehicle"></td>
</tr>
</table>
</form>
<table width="500"  border="2" cellpadding="2">
  <tr>
    <td>year</td>
    <td>make</td>
    <td>model</td>
    <td>color</td>
    <td>vin</td>
</tr>
<?php

include 'opendb.php';
$result = mysqli_query($conprd, "SELECT * FROM vehicle
WHERE vehicle.owner = '$userid'");
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
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
?>

