<html>
<body>
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
echo "<font color='red'>------test system------<font color='lightgreen'>";
$test=1;
}
echo "<br><b>Venus</b>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole3()'>open</button>";
echo "<script>";
echo "function myFunctionpihole3() {";
echo "window.open('http://venus:82/admin')";
echo ";}";
echo "</script><br>";
echo "<br><b>Artemis</b>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole2()'>open</button>";
echo "<script>";
echo "function myFunctionpihole2() {";
echo "window.open('http://artemis:82/admin')";
echo ";}";
echo "</script><br>";
?>
</body></html>
