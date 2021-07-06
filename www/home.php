<html><body>
<?php
$port=$_SERVER['SERVER_PORT'];
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
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionAA()'>Volumio</button>
<script>
function myFunctionAA() {
window.open('http://volumio')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionJJ()'>PLEX</button>
<script>
function myFunctionJJ() {
window.open('https://artemis:32400')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionM()'>TDI</button>
<script>
function myFunctionM() {
<?php
if ( $test == 1 ) {
echo "window.open('http://venus:8081/', 'target=_blank')";
} else {
echo "window.open('http://venus:8080/', 'target=_blank')";
}
?>
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionKIII()'>Home Calendar</button>
<script>
function myFunctionKIII() {
window.open('cal.php')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionWIII()'>Wunderground</button>
<script>
function myFunctionWIII() {";
window.open('https://www.wunderground.com')
;}
</script><br>
<script type="text/javascript">
 function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 30000);
    }
    window.onload = closeWindow();
    </script>
</body></html>
