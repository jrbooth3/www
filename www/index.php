<html><body>
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
echo "<font color='red'>------test system------<font color='lightgreen'><br>";
$test=1;
}
?>
<br><button style=' font-size : 36px; background-color:lightgreen' onclick='myFunctiona()'>DEV Tools</button>
<script>
function myFunctiona() {
window.open('devtools.php')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionb()'>Pi Hole</button>
<script>
function myFunctionb() {
window.open('pihole.php')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionsplunk()'>Home</button>
<script>
function myFunctionsplunk() {
window.open('home.php')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionJ()'>Biking</button>
<script>
function myFunctionJ() {
window.open('biking.php')
;}
</script>
</body></html>
