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
echo "<font color='red'>------test system------<font color='lightgreen'>";
$test=1;
}
echo "<br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionNIII()'>MTB Project</button>";
echo "<script>";
echo "function myFunctionNIII() {";
echo "window.open('http://www.mtbproject.com/')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionTF()'>TrailForks</button>";
echo "<script>";
echo "function myFunctionTF() {";
echo "window.open('https://www.trailforks.com/')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionPIII()'>Single Tracks MN</button>";
echo "<script>";
echo "function myFunctionPIII() {";
echo "window.open('https://www.singletracks.com/Minnesota-bike-trails_23.html')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionPII()'>Single Tracks WI</button>";
echo "<script>";
echo "function myFunctionPII() {";
echo "window.open('https://www.singletracks.com/Wisconsin-bike-trails_47.html')";
echo ";}";
echo "</script><br>";
echo "</td>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionOIII()'>MORC</button>";
echo "<script>";
echo "function myFunctionOIII() {";
echo "window.open('http://www.morcmtb.org')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionMORCConditions()'>MORC Trail Conditions</button>";
echo "<script>";
echo "function myFunctionMORCConditions() {";
echo "window.open('https://trails.morcmtb.org/')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionMIII()'>Woolly Bike Club</button>";
echo "<script>";
echo "function myFunctionMIII() {";
echo "window.open('http://www.woollybikeclub.com/')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionElmCreek()'>Elm Creek conditions</button>";
echo "<script>";
echo "function myFunctionElmCreek() {";
echo "window.open('https://www.threeriversparks.org/activity/mountain-biking#conditions')";
echo ";}";
echo "</script>";
echo "</td>";
echo "</tr>";
echo "</font>";
?>
<script type="text/javascript">
 function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 30000);
    }
    window.onload = closeWindow();
    </script>
</body></html>
