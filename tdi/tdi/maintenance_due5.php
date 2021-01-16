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
<?php
include 'config.php';
?>

<table width="780"  border="2" cellpadding="2">
  <tr>
    <td>Model</td><td>Item</td>
    <td>Approx date of maintenance due</td>
    </tr>

<?php
include 'opendb.php';
$resulta = mysql_query("SELECT vehicleid FROM tdi.vehicle
WHERE tdi.vehicle.owner = '$userid'");
while ($row = mysql_fetch_array($resulta,MYSQL_ASSOC)) {
$carnumber = $row{'vehicleid'};
include 'opendb.php';
$resultb = mysql_query("SELECT min(mileage), max(mileage), min(date), max(date) 
FROM tdi.rawdata, tdi.vehicle 
WHERE tdi.vehicle.vehicleid = tdi.rawdata.vehicle AND tdi.vehicle.vehicleid = '$carnumber' AND tdi.rawdata.date > date_sub(current_date(),interval 60 day) order by mileage");
while ($row = mysql_fetch_array($resultb,MYSQL_ASSOC)) {
$avgmilesperday = ($row{'max(mileage)'} -$row{'min(mileage)'})/((strtotime($row{'max(date)'})-strtotime($row{'min(date)'}))/86400);
echo "avg miles/day $avgmilesperday <p>";
$maxdate = $row{'max(date)'};
}
mysql_close($dbh);

$prevmileage = "0";
$nextmonth = mktime(0, 0, 0, date("m")+1, date("d"),   date("Y"));
$next2weeks = mktime(0, 0, 0, date("m"), date("d")+14,   date("Y"));
$today = mktime(0, 0, 0, date("m"), date("d"),   date("Y"));
//include 'milesperday.php';
include 'opendb.php';
$resultc = mysql_query("SELECT tdi.vehicle.model, 
tdi.staticint.staticitem, 
max(tdi.maintenance.mileage), 
max(tdi.rawdata.mileage), 
max(tdi.rawdata.date), 
max(tdi.rawdata.mileage), 
max(tdi.staticint.staticmileage), 
max(tdi.vendors.vendor_name)
FROM tdi.rawdata, tdi.vehicle, tdi.maintenance, tdi.staticint, tdi.vendors
WHERE tdi.maintenance.item = tdi.staticint.statid 
AND tdi.vehicle.vehicleid = tdi.maintenance.vehicle 
AND tdi.vendors.vendorid = tdi.maintenance.vendorid 
AND tdi.rawdata.vehicle = tdi.vehicle.vehicleid 
AND tdi.vehicle.vehicleid = '$carnumber'
group by tdi.staticint.staticitem;");
while ($row = mysql_fetch_array($resultc,MYSQL_ASSOC)) {
$model = $row{'model'};
print "<td>". $model. "</td>" ;
$staticitem = $row{'staticitem'};
print "<td>". $staticitem. "</td>" ;
$maindate = date ('n/j/Y' , (round(($row{'max(tdi.maintenance.mileage)'}+ $row{'staticmileage'} -$row{'max(tdi.rawdata.mileage)'})/ $avgmilesperday * 86400) + (strtotime($row{'max(tdi.rawdata.date)'}))));
if (strtotime($maindate) > $nextmonth):
	{
		print "<td bgcolor=\"#88FF88\">". $maindate. "</td>" ;
		print "</tr>" ;
	}

elseif (strtotime($maindate) > $next2weeks):
	{
		print "<td bgcolor=\"#FFFF88\">".  $maindate. "</td>";
		print "</tr>" ;

	}


elseif (strtotime($maindate) > $today):
	{
		print "<td bgcolor=\"#FFAA66\">".  $maindate. "</td>";
		print "</tr>" ;
	}
else:
	{
		print "<td bgcolor=\"#FF8888\">".  $maindate. "</td>";
		print "</tr>" ;
	}
endif;
}
mysql_close($dbh);
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


  </tr>
</table>
<?php
include 'legend.php';
?>
