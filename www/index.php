<html><body>
<?php
$port = $_SERVER['SERVER_PORT'];
$serverip=$_SERVER['SERVER_ADDR'];
echo "<body style='background-color:black;'>";
echo "<font size='24'>";
echo "<font color='lightgreen'>";
echo "<table border=0>";
echo "<col width='600'>";
echo "<col width='250'>";
if ( $port == 81 ) {
echo "<font color='red'>------test system------<font color='lightgreen'><br>";
$test=1;
}
//echo $ip .':' . $port;
/*echo "<br><button style='font-size : 36px;  background-color:lightgreen' onclick='myFunction()'>Network</button>";
echo "<script>";
echo "function myFunction() {";
echo "window.open('network.php')";
echo ";}";
echo "</script><br>";
*/
echo "<br><button style=' font-size : 36px; background-color:lightgreen' onclick='myFunctiona()'>DEV Tools</button>";
echo "<script>";
echo "function myFunctiona() {";
echo "window.open('devtools.php')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionb()'>Pi Hole</button>";
echo "<script>";
echo "function myFunctionb() {";
echo "window.open('pihole.php')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionsplunk()'>Home</button>";
echo "<script>";
echo "function myFunctionsplunk() {";
echo "window.open('home.php')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionJ()'>Biking</button>";
echo "<script>";
echo "function myFunctionJ() {";
echo "window.open('biking.php')";
echo ";}";
echo "</script>";
?>
</body></html>
