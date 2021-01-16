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
if(isset($_COOKIE["jetta_tdi"]))
//if there is, it logs you in and directes you to the members page
{ 
	$username = $_COOKIE["jetta_tdi"]; 
	$pass = $_COOKIE["Key_jetta_tdi"];

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
  <style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
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
print "<td>Item</td>";
print "<td>Date</td>";
print "<td>Last Vendor</td>";
print "</tr>";
$prevmileage = "0";
$nextmonth = mktime(0, 0, 0, date("m")+1, date("d"),   date("Y"));
$next2weeks = mktime(0, 0, 0, date("m"), date("d")+14,   date("Y"));
$today = mktime(0, 0, 0, date("m"), date("d"),   date("Y"));
//include 'milesperday.php';
include 'opendb.php';
$resulta = mysqli_query($conprd, "SELECT min(mileage), max(mileage), min(date), max(date) 
FROM rawdata, vehicle 
WHERE vehicle.vehicleid = rawdata.vehicle AND vehicle.vehicleid = '$vehicle' AND tdi.rawdata.date > date_sub(current_date(),interval 60 day) order by mileage");
while ($row = mysqli_fetch_array($resulta, MYSQLI_ASSOC)) {
$avgmilesperday = ($row{'max(mileage)'} -$row{'min(mileage)'})/((strtotime($row{'max(date)'})-strtotime($row{'min(date)'}))/86400);
$maxdate = $row{'max(date)'};
echo "avg miles per day = $avgmilesperday";
}
include 'opendb.php';
$resultc = mysqli_query($conprd, "SELECT vehicle.model, 
staticint.staticitem, 
max(maintenance.mileage), 
max(rawdata.mileage), 
max(rawdata.date), 
max(rawdata.mileage), 
max(staticint.staticmileage), 
max(vendors.vendor_name)
FROM rawdata, vehicle, maintenance, staticint, vendors
WHERE maintenance.item = staticint.statid 
AND vehicle.vehicleid = maintenance.vehicle 
AND vendors.vendorid = maintenance.vendorid 
AND rawdata.vehicle = vehicle.vehicleid 
AND vehicle.vehicleid = '$vehicle'
group by staticint.staticitem;");
while ($row = mysqli_fetch_array($resultc, MYSQLI_ASSOC)) {
$model = $row{'model'};
print "<td>". $model. "</td>" ;
$staticitem = $row{'staticitem'};
print "<td>". $staticitem. "</td>" ;
$lastmaintenance = $row{'max(maintenance.mileage)'};
$maintenanceinterval=$row{'max(staticint.staticmileage)'};
$currentmileage=$row{'max(rawdata.mileage)'};
//echo "last maintenance = $lastmaintenance maintenance interval = $maintenanceinterval current miles = $currentmileage ";
$maindate = date ('n/j/Y' , (round(($lastmaintenance + $maintenanceinterval - $currentmileage)/ $avgmilesperday * 86400) + (strtotime($row{'max(rawdata.date)'}))));
//echo "maintenance date = $maindate";
if (strtotime($maindate) > $nextmonth):
	{
		print "<td bgcolor=\"#88FF88\">". $maindate. "</td>" ;
		
	}
elseif (strtotime($maindate) > $next2weeks):
	{
		print "<td bgcolor=\"#FFFF88\">".  $maindate. "</td>";
		
	}

elseif (strtotime($maindate) > $today):
	{
		print "<td bgcolor=\"#FFAA66\">".  $maindate. "</td>";
		
	}
else:
	{
		print "<td bgcolor=\"#FF8888\">".  $maindate. "</td>";
		
	}
endif;
if ($row{'vendor_name'} =! "");
{
$vendor_name = $row{'vendor_name'};
}
print "<td>". $vendor_name. "</td></tr>" ;
}
	include 'legend.php';
mysqli_close($conprd);
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

</table>
<?php
$time_end = microtime_float();
$time = $time_end - $time_start;
echo "<br>It took " . round($time, 3) . " seconds to load the entire page\n";
?>
