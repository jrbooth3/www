<?php
// Connects to your Database 
include 'opendb.php';
//Checks if there is a login cookie
if(isset($_COOKIE['jetta_tdi']))
//if there is, it logs you in and directes you to the members page
{ 
	$username = $_COOKIE['jetta_tdi']; 
	$pass = $_COOKIE['Key_jetta_tdi'];
	
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
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
if(isset($_POST['add']))
{
include 'opendb.php';

$mileage = $_POST['mileage'];
$date = strtotime($_POST['date']);
$date = date('Y-m-d', $date);
$gallons = $_POST['gallons'];
$vehicle = $_POST['vehicle'];

$query = "INSERT INTO rawdata (data_id, mileage, date, gallons,vehicle) VALUES('', '$mileage', '$date', '$gallons','$vehicle')";
mysql_query($query) or die('insert failed');
echo "New MySQL record added<br>";
print "<p><a href=\"data.php\">add another record? </a></p>";
print "<p><a href=\"index.php\">done? </a></p>";
mysql_close($dbh);
}
else
{
?>
<form method="post">
<table width="230" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<select name="vehicle" size="1">
<script language="php">
include 'opendb.php';
   $query = "SELECT vehicleid, model FROM tdi.vehicle 
WHERE tdi.vehicle.owner = '$userid'";
   $result = mysql_query($query, $dbh);
     if(mysql_num_rows($result)) {
       // we have at least one user, so show all users as options in select form
       while($row = mysql_fetch_row($result))
       {
          print("<option value=\"$row[0]\">$row[1]</option>");
       }
     } else {
       print("<option value=\"\">No item selected</option>");
     }
mysql_close($dbh);
</script>
</tr>
<tr>
</td>
<td>Miles</td>
</tr>
<tr>
<td><input name="mileage" type="text" id="mileage"></td>
</tr>
<tr>
<td>Date</td>
</tr>
<tr>
<td><input name="date" type="text" id="date"></td>
</tr>
<tr>
<td>Gals</td>
</tr>
<tr>
<td><input name="gallons" type="text" id="gallons"></td>
</tr>
<tr>
<td><input name="add" type="submit" id="add" value="Add Fuel Entry"></td>
</tr>
</table>
</form>
</table>
<?php
}
?>
<?
			}

		}

}
?>


</body>
</html>
