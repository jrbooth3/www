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
<?php
if(isset($_POST['add']))
{
include 'opendb.php';

$date = $_POST['date'];
$vehicle = $_POST['vehicle'];
print "vehicle = $vehicle and date = $date";
$query = "DELETE FROM rawdata WHERE vehicle = '$vehicle' AND date = '$date'";
mysqli_query($conprd, $query) or die('insert failed');
include 'config.php';
echo "record deleted<br>";
print "vehicle = $vehicle and date = $date";
print "<p><a href=\"fueldata-removal.php\">delete another date? </a></p>";
print "<p><a href=\"config.php\">done? </a></p>";
print "<p><a href=\"data.php\">add another record? </a></p>";
print "<p><a href=\"index.html\">home </a></p>";
echo shell_exec("curl -X POST http://auto:11c2b82cd6caa3c9a53036d127ce5064c9@192.168.86.27:8083/job/dbNoderefresh/build?token=asd009re9sf9eaw9gtfa345rs");
mysql_close($dbh);
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
<td width="100">Date</td>
<td>
<select name="date" size="1">
<?php
include 'opendb.php';
   $query = "SELECT date FROM tdi.rawdata, tdi.vehicle, tdi.users
	WHERE tdi.rawdata.vehicle = tdi.vehicle.vehicleid AND tdi.vehicle.owner = tdi.users.userid AND tdi.users.userid = '$userid'
 	ORDER BY -date";
   $result = mysqli_query($conprd, $query);
     if(mysqli_num_rows($result)) {
       // we have at least one user, so show all users as options in select form
       while($row = mysqli_fetch_row($result))
       {
          // print date('n/j/Y' , strtotime("<option value=\"$row[0]\">$row[0]</option>"))
             print("<option value=\" $row[0]\">". date('n/j/Y' , strtotime($row[0])). "</option>");
          // print("<option value=\"$row[0]\">$row[0]</option>");
       }
     } else {
       print"<option value=\"\">No date selected</option>";
     }
?>
</td>
</tr>
<tr>
<td width="100">Vehicle</td>
<td>
<select name="vehicle" size="1">
<?php
   $query = "SELECT model, vehicleid FROM tdi.vehicle, tdi.users
	WHERE tdi.vehicle.owner = tdi.users.userid AND tdi.users.userid = '$userid'";
   $result = mysqli_query($conprd, $query);
     if(mysqli_num_rows($result)) {
       // we have at least one user, so show all users as options in select form
       while($row = mysqli_fetch_row($result))
       {
          // print date('n/j/Y' , strtotime("<option value=\"$row[0]\">$row[0]</option>"))
          //   print("<option value=\" $row[0]\">". date('n/j/Y' , strtotime($row[0])). "</option>");
           print("<option value=\"$row[1]\">$row[0]</option>");
       }
     } else {
       print"<option value=\"\">No date selected</option>";
     }

?>
</td>
</tr>

<tr>
<td width="100">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width="100">&nbsp;</td>
<td><input name="add" type="submit" id="add" value="delete record"></td>
</tr>
</table>
</form>
<table width="300"  border="2" cellpadding="2">
  <tr>
    <td>Vehicle</td>
    <td>mileage</td>
    <td>date</td>
  </tr>
<?php
include 'opendb.php';
$result = mysqli_query($conprd, "SELECT * FROM rawdata, vehicle, users
WHERE tdi.rawdata.vehicle = tdi.vehicle.vehicleid AND tdi.vehicle.owner = tdi.users.userid AND tdi.users.userid = '$userid'
ORDER BY date desc");
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
print "<td>". ($row{'model'}). "</td>" ;
print "  ";
print "<td>". number_format($row{'mileage'}). "</td>" ;
print "  ";
print "<td>". date('n/j/Y' , strtotime($row{'date'})). "</td>" ;
print "  ";
print "</tr>" ;
}
mysqli_close($con);

?>

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

