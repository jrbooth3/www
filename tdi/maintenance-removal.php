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
$item = $_POST['item'];
$query = "DELETE FROM maintenance 
WHERE date = '$date' AND item ='$item'";
mysqli_query($conprd, $query) or die('insert failed');
echo "record deleted<br>";
print "<p><a href=\"maintenance-removal.php\">delete another record?</a></p>"; 
print "<p><a href=\"config.php\">done?</a></p>";
print "<p><a href=\"maintenance.php\">add entry?</a></p>";
print "<p><a href=\"index.html\">home?</a></p>";

mysqli_close($con);
}
else
{include 'config.php';
?>
<form method="post">
<table width="780" border="2" cellspacing="2" cellpadding="2">
<tr>
<td width="100">date--></td>
<td>
<select name="date" size="1">
<?php
include 'opendb.php';
   $query = "SELECT date, staticitem, item FROM tdi.maintenance, tdi.vehicle, tdi.users, tdi.staticint
	WHERE tdi.maintenance.vehicle = tdi.vehicle.vehicleid AND tdi.vehicle.owner = tdi.users.userid AND tdi.staticint.statid = tdi.maintenance.item AND tdi.users.userid = '$userid'
	GROUP BY -date ";
   $result = mysqli_query($conprd, $query);
     if(mysqli_num_rows($result)) {
       // we have at least one user, so show all users as options in select form
       while($row = mysqli_fetch_row($result))
       {
          //print("<option value=\" $row('date')\">". date('n/j/Y' , strtotime($row('date'))). "</option>");
            print("<option value=\" $row[0]\">". date('n/j/Y' , strtotime($row[0])). "</option>");
          //print("<option value=\"$row[0]\">$row[0]</option>");
       }
     } else {
       print("<option value=\"\">No date selected</option>");
     }
?>
</td>
<td width="100">Item--></td>
<td>
<select name="item" size="1">
<?php
include 'opendb.php';
   $query = "SELECT tdi.maintenance.item, tdi.staticint.staticitem FROM tdi.maintenance, tdi.vehicle, tdi.users, tdi.staticint
WHERE tdi.maintenance.vehicle = tdi.vehicle.vehicleid AND tdi.staticint.statid = tdi.maintenance.item AND tdi.vehicle.owner = tdi.users.userid AND tdi.users.userid = '$userid' 
GROUP BY item";
   $result = mysqli_query($conprd, $query);
     if(mysqli_num_rows($result)) {
       // we have at least one user, so show all users as options in select form
       while($row = mysqli_fetch_row($result))
       {
          print("<option value=\"$row[0]\">$row[1]</option>");
       }
     } else {
       print("<option value=\"\">No item selected</option>");
     }
?>

</td>
<td><input name="add" type="submit" id="add" value="delete record"></td>
</tr>
</table>
</form>
<table width="780"  border="2" cellpadding="2">
  <tr>
    <td>Model</td>
    <td>item</td>
    <td>mileage</td>
    <td>date</td>
  </tr>
<?php
include 'opendb.php';
$result = mysqli_query($conprd, "SELECT * FROM maintenance, vehicle, users, staticint
WHERE tdi.maintenance.vehicle = tdi.vehicle.vehicleid AND tdi.staticint.statid = tdi.maintenance.item AND tdi.vehicle.owner = tdi.users.userid AND tdi.users.userid = '$userid' 
ORDER BY -date");
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
print "<td>". $row{'model'}. "</td>" ;
print "  ";
print "<td>". $row{'staticitem'}. "</td>" ;
print "  ";
print "<td>". number_format($row{'mileage'}). "</td>" ;
print "  ";
print "<td>". date('n/j/Y' , strtotime($row{'date'})). "</td>" ;
print "  ";
print "</tr>" ;
}
	//print("<option value=\" $row[0]\">". date('n/j/Y' , strtotime($row[0])). "</option>");
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
