
<?php
// Connects to your Database 
include 'opendb.php';
//Checks if there is a login cookie
if(isset($_COOKIE["jetta_tdi"]))
//if there is, it logs you in and directes you to the members page
{ 
	$username = $_COOKIE["jetta_tdi"]; 
	$pass = $_COOKIE["Key_jetta_tdi"];
	
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
    <td>Mileage</td>
    <td>Item</td>
</tr>
<?php
include 'opendb.php';
$result = mysqli_query($conprd, "SELECT staticint.staticitem, staticint.staticmileage FROM staticint WHERE staticint.statowner = '$userid' ORDER BY staticitem;");
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
print "<td>". number_format ($row{'staticmileage'}). "</td>" ;
print "  ";
print "<td>". ucwords ($row{'staticitem'}). "</td>". "</tr>" ;
}
mysqli_close($conprd);
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
