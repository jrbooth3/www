<?php
include 'opendb.php';
$port = $_SERVER['SERVER_PORT'];
if ( $test == 1 ) {
echo "<h1><font color='red'>test system DB " . $hostname . " </font></h1>";
}
// Connects to your Database
//$con=mysqli_connect($hostname, $username, $password, "tdi" );
//Checks if there is a login cookie
if(isset($_COOKIE['jetta_tdi'])) {
	$username = $_COOKIE['jetta_tdi'];
	$pass = $_COOKIE['Key_jetta_tdi'];
	include 'opendb.php';
	$check = mysqli_query($conprd, "SELECT * FROM users WHERE username = '$username'");
	while($info = mysqli_fetch_array( $check ))
		{
		echo "query db for user id";
		if ($pass != $info['user_password'])
			{
				echo "shit not found";
			}
		else
			{
			header("Location: index.php");
			}
		}
}
//if the login form is submitted
if (isset($_POST['submit'])) { // if form has been submitted
echo "post submitted <br>";
// makes sure they filled it in
echo "user " . $_POST['username'] . " posted ";
	if(!$_POST['username'] | !$_POST['pass']) {
		die('You did not fill in a required field.');
	echo "user name and pw not blank";
	}

	// checks it against the database

	if (!get_magic_quotes_gpc()) {
		$_POST['email'] = addslashes($_POST['email']);
	}
//echo "step 2 " . $select . " statement";
	$check = mysqli_query($conprd, "SELECT * FROM users WHERE username = '".$_POST['username']."'");
echo "check user name against db";
//Gives error if user dosen't exist

$check2 = mysqli_num_rows($check);
if ($check2 == 0) {
		die('That user does not exist in our database. <a href=user_registration.php>Click Here to Register</a>');
		}


while($info = mysqli_fetch_array( $check ))
{

$_POST['pass'] = stripslashes($_POST['pass']);
	$info['user_password'] = stripslashes($info['user_password']);
	$_POST['pass'] = md5($_POST['pass']);

//gives error if the password is wrong

	if ($_POST['pass'] != $info['user_password']) {
		die('Incorrect password, please try again.');
	}
//echo "step 1";
else
{
// if login is ok then we add a cookie
echo "set cookies";
$_POST['username'] = stripslashes($_POST['username']);
$hour = time() + 3600;
setcookie("jetta_tdi", $_POST['username'], $hour);
setcookie("Key_jetta_tdi", $_POST['pass'], $hour);

//then redirect them to the members area
header("Location: index.php");
}

}

} else {

//they are not logged in

?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<table border="0">
<tr><td colspan=2><h1>Login</h1></td></tr>
<tr><td>Username:</td><td>
<input type="text" name="username" autofocus maxlength="40">
</td></tr>
<tr><td>Password:</td><td>
<input type="password" name="pass" maxlength="50">
</td></tr>
<tr><td colspan="2" align="right">
<input type="submit" name="submit" value="Login">
</td></tr>
</table>
</form>
<?php
}
mysqli_close($conprd);
echo "<a href='user_registration.php'>Create an ID</a>";
?>
