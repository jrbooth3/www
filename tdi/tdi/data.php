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
if($mileage > 1)
{
$query = "INSERT INTO rawdata (mileage, date, gallons,vehicle) VALUES('$mileage', '$date', '$gallons','$vehicle')";
mysqli_query($conprd, $query);
echo "New MySQL record added<br>";
print "<p><a href=\"data.php\">add another record? </a></p>";
print "<p><a href=\"index.php\">done? </a></p>";
mysqli_close($conprd);
if ( $test == 1 ) {
echo "<font color=red>------TEST SYSTEM NO DB CHANGE WILL BE PERFORMED-----</font>";
} else {
echo shell_exec("curl -X POST http://auto:11c2b82cd6caa3c9a53036d127ce5064c9@192.168.86.27:8083/job/dbNoderefresh/build?token=asd009re9sf9eaw9gtfa345rs");
}
} else {
header( 'Location:http://artemis/tdi/index.php' ) ;
}
?>
<table width="780"  border="2" cellpadding="2">
  <tr>
    <td>vehicle <?php $userid ?> </td>
    <td>Mileage</td>
    <td>Date Y-M-D</td>
    <td>Gallons</td>
</tr>
<?php

include 'opendb.php';
$result = mysqli_query($conprd, "SELECT * FROM rawdata, vehicle WHERE rawdata.vehicle = vehicle.vehicleid AND vehicle.vehicleid = '$vehicle' ORDER BY - mileage LIMIT 10");
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
print "<td>". $row{'model'}. "</td>" ;
print "  ";
print "<td>". number_format ($row{'mileage'}). "</td>" ;
print "  ";
print "<td>". date ('n/j/Y' , strtotime($row{'date'})) . "</td>" ;
print "  ";
print "<td>". number_format ($row{'gallons'}, 2). "</td>". "</tr>" ;
}
mysqli_close($conprd);

?>
  </tr>
</table>
<?php
print "<table width=\"780\" border=\"1\" cellspacing=\"1\" cellpadding=\"2\">";
print "<tr>";
print "<td>Car</td>";
print "<td>Item</td>";
print "<td>Date</td>";
print "</tr>";
$prevmileage = "0";
$nextmonth = mktime(0, 0, 0, date("m")+1, date("d"),   date("Y"));
$next2weeks = mktime(0, 0, 0, date("m"), date("d")+14,   date("Y"));
$today = mktime(0, 0, 0, date("m"), date("d"),   date("Y"));
//include 'milesperday.php';
include 'opendb.php';
$resulta = mysqli_query($conprd, "SELECT min(mileage), max(mileage), min(date), max(date)
FROM rawdata, vehicle
WHERE vehicle.vehicleid = rawdata.vehicle AND vehicle.vehicleid = '$vehicle' AND rawdata.date > date_sub(current_date(),interval 60 day) order by mileage");
while ($row = mysqli_fetch_array($resulta,MYSQLI_ASSOC)) {
$avgmilesperday = ($row{'max(mileage)'} -$row{'min(mileage)'})/((strtotime($row{'max(date)'})-strtotime($row{'min(date)'}))/86400);
$maxdate = $row{'max(date)'};
}
$resultc = mysqli_query($conprd, "SELECT vehicle.model, staticitem, max(maintenance.mileage), max(rawdata.mileage), max(rawdata.date), rawdata.mileage, staticmileage
FROM rawdata, vehicle, maintenance, staticint
WHERE maintenance.item = staticint.statid AND vehicle.vehicleid = maintenance.vehicle AND rawdata.vehicle = vehicle.vehicleid AND vehicle.vehicleid = '$vehicle'
group by staticitem;");
while ($row = mysqli_fetch_array($resultc,MYSQLI_ASSOC)) {
$model = $row{'model'};
print "<td>". $model. "</td>" ;
$staticitem = $row{'staticitem'};
print "<td>". $staticitem. "</td>" ;
$maindate = date ('n/j/Y' , (round(($row{'max(maintenance.mileage)'}+ $row{'staticmileage'} -$row{'max(rawdata.mileage)'})/ $avgmilesperday * 86400) + (strtotime($row{'max(rawdata.date)'}))));
if (strtotime($maindate) > $nextmonth):
	{
		print "<td bgcolor=\"#88FF88\">". $maindate. "</td>" ;
		print "</tr>" ;
	}
elseif (strtotime($maindate) > $next2weeks):
	{
		print "<td bgcolor=\"#FFAA66\">".  $maindate. "</td>";
		print "</tr>" ;
	}
elseif (strtotime($maindate) > $today):
	{
		print "<td bgcolor=\"#FFFF88\">".  $maindate. "</td>";
		print "</tr>" ;
	}
else:
	{
		print "<td bgcolor=\"#FF8888\">".  $maindate. "</td>";
		print "</tr>" ;
	}
endif;
}
	include 'legend.php';
mysqli_close($conprd);

?>
<?php
}
else
{
?>
<form method="post">
<?php
include 'config.php';
//echo "user id = " . $userid . " id";
?>
<table width="780" border="2" cellspacing="2" cellpadding="2">
<tr>
<td>vehicle</td>
<td>
<select name="vehicle" size="1">
<?php
include 'opendb.php';
include 'vehicleSelect.php';
?>
</tr>
<tr>
</td>
<td>Mileage</td>
<td><input name="mileage" type="text" id="mileage"></td>
</tr>
<tr>
<td>Date</td>
<td><input name="date" type="text" id="date" value = "
<?php
echo $today
?> " </td>
</tr>
<tr>
<td>Gallons</td>
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
<?php
			}

		}

}
else
	{
	header('Location: login.php');
	}
?>


</body>
</html>
