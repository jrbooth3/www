<?php
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
$time_start = microtime_float();
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
<table width="780" border="1" cellspacing="1" cellpadding="2">
  
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
print "<td>Accuracy</td>";
print "<td>Fuel Mileage</td>";
print "</tr>";

include 'opendb.php';
$result = mysqli_query($conprd, "SELECT min(mileage) FROM rawdata, vehicle WHERE vehicle.vehicleid = rawdata.vehicle AND vehicle.vehicleid = '$vehicle' AND date > date_sub(current_date(),interval 180 day) order by mileage");
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$prevmileage = $row{'min(mileage)'};
}
mysqli_close($conprd);
include 'opendb.php';
$result = mysqli_query($conprd, "SELECT model, mileage, date, gallons FROM rawdata, vehicle WHERE vehicle.vehicleid = rawdata.vehicle AND vehicle.vehicleid = '$vehicle' AND date > date_sub(current_date(),interval 180 day) ORDER BY mileage");
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$acr = round((($row{'gallons'} + 20) / 35.4) * 100);
print "<tr><td>". $row{'model'}. "</td>" ;
print "<td>". date ('n/j/Y' , strtotime($row{'date'})) . "</td>" ;
print "<td>". $acr. "%</td>";
print "<td>". number_format(($row{'mileage'}-$prevmileage)/$row{'gallons'}, 2) . "</td></tr>";
//print "</table>";
$prevmileage = $row{'mileage'};
}
mysqli_close($conprd);
//$time_end = microtime_float();
//$time = $time_end - $time_start;
//echo "It took " . round($time, 3) . "seconds to load this page\n";
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
<?php
$time_end = microtime_float();
$time = $time_end - $time_start;
echo "<br>It took " . round($time, 3) . " seconds to load the entire page\n";
?>

