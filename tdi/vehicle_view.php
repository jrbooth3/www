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
include 'config.php';
?>
<table width="780"  border="2" cellpadding="2">
  <tr>
    <td>year</td>
    <td>make</td>
    <td>model</td>
    <td>color</td>
    <td>vin</td>
</tr>
<?php

include 'opendb.php';
$result = mysqli_query($conprd, "SELECT * FROM vehicle WHERE vehicle.owner = '$userid'");
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
print "<td>". $row{'year'}. "</td>" ;
print "  ";
print "<td>". $row{'make'}. "</td>" ;
print "  ";
print "<td>". $row{'model'}. "</td>" ;
print "  ";
print "<td>". $row{'color'}. "</td>" ;
print "  ";
print "<td>". $row{'vin'}. "</td>". "</tr>" ;
}

mysqli_close($conprd);

?>
</table>
<?php
			}

		}

}
?>

