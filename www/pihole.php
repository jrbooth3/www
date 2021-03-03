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
echo "<br><font color='red'>------test system------<font color='lightgreen'>";
$test=1;
}
echo "<br><b>Pi-Hole DNS servers<b><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole1()'>Andromeda</button>";
echo "<script>";
echo "function myFunctionpihole1() {";
echo "window.open('http://andromeda:82/admin')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole2()'>Artemis</button>";
echo "<script>";
echo "function myFunctionpihole2() {";
echo "window.open('http://artemis:82/admin')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole3()'>Venus/Neptune/Saturn swarm cluster</button>";
echo "<script>";
echo "function myFunctionpihole3() {";
echo "window.open('http://venus:82/admin')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole4()'>Pluto</button>";
echo "<script>";
echo "function myFunctionpihole4() {";
echo "window.open('http://pluto:82/admin')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole5()'>Milkyway</button>";
echo "<script>";
echo "function myFunctionpihole5() {";
echo "window.open('http://milkyway:82/admin')";
echo ";}";
echo "</script><br>";
?>
</body></html>
