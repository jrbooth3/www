<?php
// Connects to your Database 
include 'opendb.php';
$today = date('Y/m/d', strtotime("Now"));
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

$item = $_POST['item'];
$mileage = $_POST['mileage'];
$date = date('Y-m-d', strtotime($_POST['date']));
//$date = date('Y-m-d', $date);
$vehicle = $_POST['vehicle'];
$vendor = $_POST['vendor'];
$parts = $_POST['parts'];
$labor = $_POST['labor'];
$hours = $_POST['hours'];
if($mileage > 1)
{
$query = "INSERT INTO maintenance (item, mileage, date, vehicle, vendorid, parts, labor, hours)
VALUES('$item', '$mileage', '$date', '$vehicle', '$vendor', '$parts', '$labor', '$hours')";
mysqli_query($conprd, $query) or die('insert failed');
echo "New MySQL record added<br>";
print "<p><a href=\"maintenance.php\">add another record? </a></p>";
print "<p><a href=\"index.php\">done? </a></p>";
echo shell_exec("curl -X POST http://auto:11c2b82cd6caa3c9a53036d127ce5064c9@192.168.86.27:8083/job/dbNoderefresh/build?token=asd009re9sf9eaw9gtfa345rs");
mysqli_close($con);

 } else {
header( 'Location:http://192.168.86.25/tdi/index.php' ) ;
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
<tr><td width="100">vehicle</td>
<td><select name="vehicle" size="1">
<?php
include 'opendb.php';
   $query = "SELECT model, vehicleid FROM vehicle
		WHERE vehicle.owner = '$userid'";
   $result = mysqli_query($conprd, $query);
     if(mysqli_num_rows($result)) {
       // we have at least one user, so show all users as options in select form

       while($row = mysqli_fetch_row($result))
       {
       echo "<option value=" .$row[1]. ">" .$row[0]. "</option>";
       }
     } else {
       print("<option value=\"\">No item selected</option>");
     }
mysqli_close($conprd);
?>
</td></tr><tr><td width="100">item</td><td>
<select name="item" size="1">
<?php
include 'opendb.php';
   $query = "SELECT staticint.staticitem, staticint.statid
FROM staticint WHERE staticint.statowner = '$userid'
order by staticint.staticitem";
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
mysqli_close($conprd);
?>
</td></tr><tr><td width="100">mileage</td>
<td><input name="mileage" type="text" id="mileage"></td></tr>
<tr><td width="100">date</td>
<td><input name="date" type="text" id="date" value = "
<?php
echo $today
?> "
></td></tr>
<tr><td width="100">Vendor</td>
<td><select name="vendor" size="1">
<?php
include 'opendb.php';
   $query = "SELECT vendor_name, vendorid FROM vendors WHERE tdi.vendors.owner= '$userid'";
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
mysqli_close($conprd);
?>
</td></tr><tr><td width="100">Parts cost $</td>
<td><input name="parts" type="text" id="parts"></td></tr>
<tr><td width="100">Labor cost $</td>
<td><input name="labor" type="text" id="labor"></td></tr>
<tr><td width="100">Hours</td>
<td><input name="hours" type="text" id="hours"></td></tr>
<tr><td><input name="add" type="submit" id="add" value="Add Maintenance Entry"></td></tr>
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
