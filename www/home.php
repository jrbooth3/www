<html><body>
<?php
$port=$_SERVER['SERVER_PORT'];
$serverip=$_SERVER['SERVER_ADDR'];
echo "<body style='background-color:black;'>";
echo "<font size='24'>";
echo "<font color='lightgreen'>";
echo "<table border=0>";
echo "<col width='600'>";
echo "<col width='250'>";
echo "<br>";
if ( $port == 81 ) {
echo "<font color='red'>------test system------<font color='lightgreen'><br>";
$test=1;
}
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionAA()'>Volumio</button>";
echo "<script>";
echo "function myFunctionAA() {";
echo "window.open('http://volumio')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionJJ()'>PLEX</button>";
echo "<script>";
echo "function myFunctionJJ() {";
echo "window.open('http://artemis:32400')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionM()'>TDI</button>";
 echo "<script>";
echo "function myFunctionM() {";
if ( $test == 1 ) {
echo "window.open('http://artemis:8081/', 'target=_blank')";
} else {
echo "window.open('http://artemis:8080/', 'target=_blank')";
}
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionKIII()'>Home Calendar</button>";
echo "<script>";
echo "function myFunctionKIII() {";
echo "window.open('cal.php')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionWIII()'>Wunderground</button>";
echo "<script>";
echo "function myFunctionWIII() {";
echo "window.open('https://www.wunderground.com')";
echo ";}";
echo "</script><br>";
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
