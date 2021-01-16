<?php
//
$port = $_SERVER['SERVER_PORT'];
if ( $port == 8081 ) {
$test = 1;
$username = "jimbo";
$password = "jones";
$hostname = "192.168.86.20";
$conprd = mysqli_connect($hostname, $username, $password, "tdi" );
} else {
$test = 0;
$username = "jimbo";
$password = "jones";
$hostname = "192.168.86.29";
$conprd = mysqli_connect($hostname, $username, $password, "tdi" );
}
?>
