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
};
?>

  </tr>
</table>

  
<?php
			}

		}

}
else
{
header('Location: login.php');
}
?>

