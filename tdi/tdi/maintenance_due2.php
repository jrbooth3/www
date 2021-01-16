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
if(isset($_POST['add']))
{
include 'opendb.php';
$item = $_POST['item'];
$mileage = $_POST['mileage'];
$date = strtotime($_POST['date']);
$date = date('Y-m-d', $date);
$vehicle = $_POST['vehicle'];
include 'config.php';
print "<table width=\"780\" border=\"1\" cellspacing=\"1\" cellpadding=\"2\">";
print "<tr>";
print "<td>Car</td>";
print "<td>Date</td>";
print "</tr>";
$prevmileage = "0";
//include 'milesperday.php';
include 'opendb.php';
$resulta = mysql_query("SELECT min(mileage), max(mileage), min(date), max(date) 
FROM tdi.rawdata, tdi.vehicle 
WHERE tdi.vehicle.vehicleid = tdi.rawdata.vehicle AND tdi.vehicle.vehicleid = '$vehicle' AND tdi.rawdata.date > date_sub(current_date(),interval 60 day) order by mileage");
while ($row = mysql_fetch_array($resulta,MYSQL_ASSOC)) {
$avgmilesperday = ($row{'max(mileage)'} -$row{'min(mileage)'})/((strtotime($row{'max(date)'})-strtotime($row{'min(date)'}))/86400);
}
include 'opendb.php';
$resultc = mysql_query("SELECT tdi.vehicle.model, staticitem, max(tdi.maintenance.mileage), max(tdi.rawdata.mileage), max(tdi.rawdata.date), tdi.rawdata.mileage, staticmileage
FROM tdi.rawdata, tdi.vehicle, tdi.maintenance, tdi.staticint
WHERE tdi.maintenance.item = tdi.staticint.statid AND tdi.vehicle.vehicleid = tdi.maintenance.vehicle AND tdi.rawdata.vehicle = tdi.vehicle.vehicleid AND tdi.vehicle.vehicleid = '$vehicle'
group by staticitem;");
while ($row = mysql_fetch_array($resultc,MYSQL_ASSOC)) {
print "<td>". $row{'model'}. "-->" ;
print $row{'staticitem'}. "</td>" ;
print "<td>". date ('n/j/Y' , (round(($row{'max(tdi.maintenance.mileage)'}+ $row{'staticmileage'} -$row{'max(tdi.rawdata.mileage)'})/ $avgmilesperday * 86400) + (strtotime($row{'max(tdi.rawdata.date)'})))). "</td>" ;
print "</tr>" ;
}
	
mysql_close($dbh);
}
else
{
?>
<form method="post">
<?
include 'config.php';
?>

<table width="780" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">vehicle</td>
<td>
<select name="vehicle" size="1">
<script language="php">
include 'opendb.php';
   $query = "SELECT model, vehicleid FROM tdi.vehicle
		WHERE tdi.vehicle.owner = '$userid' ";
   $result = mysql_query($query, $dbh);
     if(mysql_num_rows($result)) {
       // we have at least one user, so show all users as options in select form
       while($row = mysql_fetch_row($result))
       {
          print("<option value=\"$row[1]\">$row[0]</option>");
       }
     } else {
       print("<option value=\"\">No item selected</option>");
     }
mysql_close($dbh);
</script>
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
<?
			}

		}

}
else
	{
	header('Location: login.php');
	}
?>

</table>
