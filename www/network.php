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
echo "<br><br><b>Network</b><br><br>";
//if ( $dnsrows >= 1 ) {
echo "<button style='font-size : 36px;  background-color:lightgreen' onclick='myFunction()'>Internet status</button>";
//} else {
//echo "<button style='font-size : 36px; background-color:pink' onclick='myFunction()'>Internet errors " . $dnsrows . "</button>";
//echo "<meta http-equiv='refresh' content='0'>";
//}
echo "<script>";
echo "function myFunction() {";
echo "window.open('test1.php')";
echo ";}";
echo "</script><br>";
//if ( $dnsrows > 2 ) {
echo "<button style=' font-size : 36px; background-color:lightgreen' onclick='myFunctiona()'>DNS status </button>";
//} else {
//echo "<button style='font-size : 36px; background-color:pink' onclick='myFunctiona()'>DNS status " . $dnsrows . "</button>";
//echo "<meta http-equiv='refresh' content='0'>";
//}
echo "<script>";
echo "function myFunctiona() {";
echo "window.open('test1_1.php')";
echo ";}";
echo "</script><br>";
//if ( $nwsrows >= 1 ) {
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionb()'>Network Device status </button>";
//} else {
//echo "<button style='font-size : 36px; background-color:pink' onclick='myFunctionb()'>Network Device status " . $nwsrows . "</button>";
//echo "<meta http-equiv='refresh' content='0'>";
//}
echo "<script>";
echo "function myFunctionb() {";
echo "window.open('test2.php')";
echo ";}";
echo "</script><br>";
/*
//TDI db tests
//if (($rowcntjup == $rowcntsat) && ($rowcntsat == $rowcntnep) && ($rowcntven == $rowcntnep)) {
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionsplunk()'>DB Sync Status</button>";
//} else{
//echo "<button style='font-size : 36px; background-color:pink' onclick='myFunctionsplunk()'>DB sync JupDB " . $rowcntjup. " SatDB  "  . $rowcntsat . " NepDB " . $rowcntnep . " VenDB " . $rowcntven . "</button>";
//}
echo "<script>";
echo "function myFunctionsplunk() {";
echo "window.open('dbsync.php')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunction2day()'>2 Day Temp</button>";
echo "<script>";
echo "function myFunction2day() {";
echo "window.open('2Daytemp.php')";
echo ";}";
echo "</script>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunction3mo()'>3 Month space free</button>";
echo "<script>";
echo "function myFunction3mo() {";
echo "window.open('3MonthSpace.php')";
echo ";}";
echo "</script>";
*/
//ext ip
//if ( $ipaddressrows >= 3 ) {
//echo "<button style='font-size : 36px; background-color:pink' onclick='myFunctionJ()'>Public IP</button>";
//echo "<meta http-equiv='refresh' content='0'>";
//} else {
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionJ()'>Public IP</button>";
//}
echo "<script>";
echo "function myFunctionJ() {";
echo "window.open('homeip.php')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunction2day()'>2 Day Temp</button>";
echo "<script>";
echo "function myFunction2day() {";
echo "window.open('2Daytemp.php')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunction3mo()'>1 Month space free</button>";
echo "<script>";
echo "function myFunction3mo() {";
echo "window.open('3MonthSpace.php')";
echo ";}";
echo "</script>";
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
