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
<font color='red'>------test system------<font color='lightgreen'>";
$test=1;
}
?>
<br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionNIII()'>MTB Project</button>
<script>
function myFunctionNIII() {
window.open('http://www.mtbproject.com/')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionTF()'>TrailForks</button>
<script>
function myFunctionTF() {
window.open('https://www.trailforks.com/')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionPIII()'>Single Tracks MN</button>
<script>
function myFunctionPIII() {
window.open('https://www.singletracks.com/Minnesota-bike-trails_23.html')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionPII()'>Single Tracks WI</button>
<script>
function myFunctionPII() {
window.open('https://www.singletracks.com/Wisconsin-bike-trails_47.html')
;}
</script><br>
</td>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionOIII()'>MORC</button>
<script>
function myFunctionOIII() {
window.open('http://www.morcmtb.org')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionMORCConditions()'>MORC Trail Conditions</button>
<script>
function myFunctionMORCConditions() {
window.open('https://trails.morcmtb.org/')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionMIII()'>Woolly Bike Club</button>
<script>
function myFunctionMIII() {
window.open('http://www.woollybikeclub.com/')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionElmCreek()'>Elm Creek conditions</button>
<script>
function myFunctionElmCreek() {
window.open('https://www.threeriversparks.org/activity/mountain-biking#conditions')
;}
</script>
</td>
</tr>
</font>
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
