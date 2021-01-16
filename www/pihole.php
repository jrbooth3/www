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
echo "<br><b>Artemisp82</b>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole2()'>open</button>";
echo "<script>";
echo "function myFunctionpihole2() {";
echo "window.open('http://artemis:82/admin')";
echo ";}";
echo "</script><br>";
/*
echo "<br><b>earth</b>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole1()'>open</button>";
echo "<script>";
echo "function myFunctionpihole1() {";
echo "window.open('http://earth:82/admin')";
echo ";}";
echo "</script><br>";
*/
echo "<br><b>Venus</b>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole3()'>open</button>";
echo "<script>";
echo "function myFunctionpihole3() {";
echo "window.open('http://venus:82/admin')";
echo ";}";
echo "</script><br>";
echo "<br><b>Saturn</b>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole4()'>open</button>";
echo "<script>";
echo "function myFunctionpihole4() {";
echo "window.open('http://saturn:82/admin')";
echo ";}";
echo "</script><br>";
echo "<br><b>Neptune</b>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole5()'>open</button>";
echo "<script>";
echo "function myFunctionpihole5() {";
echo "window.open('http://neptune:82/admin')";
echo ";}";
echo "</script><br>";
/*
echo "<br><b>Andromeda</b>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole6()'>open</button>";
echo "<script>";
echo "function myFunctionpihole6() {";
echo "window.open('http://andromeda:82/admin')";
echo ";}";
echo "</script><br>";
echo "<br><b>Pluto</b>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole7()'>open</button>";
echo "<script>";
echo "function myFunctionpihole7() {";
echo "window.open('http://pluto:82/admin')";
echo ";}";
echo "</script><br>";
echo "<br><b>Milkyway</b>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole8()'>open</button>";
echo "<script>";
echo "function myFunctionpihole8() {";
echo "window.open('http://milkyway:82/admin')";
echo ";}";
echo "</script><br>";
*/
echo "<br>";
?>
</body></html>
