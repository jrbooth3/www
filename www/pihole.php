<html>
<body>
<?php
$port = $_SERVER['SERVER_PORT'];
$serverip=$_SERVER['SERVER_ADDR'];
?>
<body style='background-color:black;'>
<font size='24'>
<font color='lightgreen'>
<table border=0>
<col width='600'>
<col width='250'>
<?php
if ( $port == 81 ) {
echo "<font color='red'>------test system------<font color='lightgreen'>";
$test=1;
}
?>
<br><br><b>Pi-Hole DNS servers<b><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole3()'>Cygnus</button>
<script>
function myFunctionpihole3() {
window.open('http://cygnus:82/admin')
;}
</script><br>
/* <button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole4()'>Pluto</button>
<script>
function myFunctionpihole4() {
window.open('http://pluto:82/admin')
;}
</script><br> */
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionpihole5()'>Milkyway</button>
<script>
function myFunctionpihole5() {
window.open('http://milkyway:82/admin')
;}
</script><br>
</body></html>
