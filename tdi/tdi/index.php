<?php
// test system 8081
//echo "<font size='36'>";
//phpinfo();
// Connects to your Database 
//Checks if there is a login cookie
echo "  ";
if(isset($_COOKIE["jetta_tdi"]))
{
	// cookie test
	$userid = $_COOKIE["jetta_tdi"]; 
	$pass = $_COOKIE["Key_jetta_tdi"];
	include 'opendb.php';
	$con=mysqli_connect($hostname, $username, $password, "tdi" );
	$check = mysqli_query($conprd, "SELECT * FROM users WHERE username = '$userid'");

	while($info = mysqli_fetch_array( $check )) 
	{
		if ($pass != $info['user_password']) 
		{
			header('Location: login.php');
		}
		else
		{
			include 'config.php';

		}
	}
}
else
{
header('Location: login.php');
}
?>
