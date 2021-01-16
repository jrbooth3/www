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

$vendorid = $_POST['vendorid'];

$checkmaintenance = mysqli_query($conprd, "SELECT * FROM maintenance, rawdata WHERE tdi.maintenance.vendorid = '$vendorid'")or die(mysql_error());
$check3 = mysqli_num_rows($checkmaintenance);
if ($check3 > 0) {
		die('Vendor data exists in maintenance entries. Please remove all maintenance entries for this vendor first. <a href=index.php>Click Here to return to home</a>');
				}
$query = "DELETE FROM vendors
WHERE vendorid = '$vendorid'";
mysqli_query($conprd, $query) or die('insert failed');
include 'config.php';
echo "record deleted<br>";
print "<p><a href=\"vehicle-removal.php\">delete another vendor? </a></p>";
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
<td width="100">Vendor</td>
<td>
<select name="vendorid" size="1">
<?php
include 'opendb.php';
   $query = "SELECT vendorid, vendor_name FROM tdi.vendors, tdi.users
WHERE tdi.vendors.owner = tdi.users.userid AND tdi.users.userid = '$userid'";
   $result = mysqli_query($conprd, $query);
     if(mysqli_num_rows($result)) {
       // we have at least one user, so show all users as options in select form
       while($row = mysqli_fetch_row($result))
       {
          print("<option value=\"$row[0]\">$row[1]</option>");
       }
     } else {
       print("<option value=\"\">No vehicle selected</option>");
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
<table width="780"  border="2" cellpadding="2">
  <tr>
    <td>vendor</td>
    <td>telephone</td>
    <td>address</td>
    <td>contact</td>
  </tr>
<?php

include 'opendb.php';
$result = mysqli_query($conprd, "SELECT * FROM tdi.vendors
WHERE tdi.vendors.owner = '$userid'");
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
print "<td>". $row{'vendor_name'}. "</td>" ;
print "  ";
print "<td>". $row{'tele'}. "</td>" ;
print "  ";
print "<td>". $row{'address'}. "</td>" ;
print "  ";
print "<td>". $row{'contact'}. "</td>" ;
print "  ";
print "</tr>" ;
}
	
mysqli_close($con);

?>

  </tr>
</table>
<?php
}
			}

		}

}
else
{
header('Location: login.php');
}
?>

