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
<font color='red'>------test system------<font color='lightgreen'>
$test = 1;
}
?>
<br><br>--Tools--
<br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionJenk()'>Jenkins</button>
<script>
function myFunctionJenk() {
window.open('http://artemis:8083')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionviz()'>Docker Swarm Status</button>
<script>
function myFunctionviz() {
window.open('http://artemis:85/')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionb()'>Network Device status </button>
<script>
function myFunctionb() {
window.open('test2.php')
;}
</script><br><br>
Network<br><br>
Topology<br>
IP address Lethe001/X0=10.0.0.1<br>
IP address Lethe001/X1=dynamic from router<br>
IP address Lethe001/X2=192.168.86.4<br><br>
IP address Styx0001/X0=192.168.86.3<br>
IP address Styx0001/X1=dynamic router<br><br>
IP address Google wifi (acheron)192.168.86.1 <br>
IP address Google internet 10.0.0.2<br>
IP address Netgear NightHawk <br><br>
router > switch1/vlan1 > TOR wifi router advertised name Lethe PorkPie321<br>
router > switch1/vlan1 > Lethe001/X1 > Lethe001/X0 > Google mesh internet<br>
router > switch1/vlan1 > Lethe001/X1 > Lethe001/X2 > switch1/vlan0 for port forwarding<br>
router > switch2/vlan1 > Styx0001/X1 > Styx0001/X0 > switch2/vlan0<br><br>
vlan0 switch ports 9-47 internal network<br>
vlan1 switch ports 1-8,48 internet facing<br><br>
Google mesh wifi network on switch1 vlan0<br>
Google mesh internet network Lethe001/X0<br>
Netgear NightHawk wifi network on switch2 vlan0<br><br>
Switches<br>
---Cisco<br>
------2960G 10/100/1000 48 port<br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionsw1()'>Switch1</button>
<script>
function myFunctionsw1() {
window.open('http://switch1')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionsw2()'>Switch2</button>
<script>
function myFunctionsw2() {
window.open('http://switch2')
;}
</script><br><br>
firewalls<br>
---SonicWall<br>
------PRO 5060 10/100/1000 primary<br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionfw2()'>Lethe001</button>
<script>
function myFunctionfw2() {
window.open('https://lethe001')
;}
</script><br>

------PRO 2040 10/100 secondary<br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionfw1()'>Styx0001</button>
<script>
function myFunctionfw1() {
window.open('https://styx0001')
;}
</script><br><br>

--Systems--<br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionnet()'>System's status pages</button>
<script>
function myFunctionnet() {
window.open('serverstatus.php')
;}
</script><br><br>
--Development sites--<br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctiondockerhub()'>Docker Hub</button>
<script>
function myFunctiondockerhub() {
window.open('https://hub.docker.com/')
;}
</script><br>
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctiongit()'>GIT</button>
<script>
function myFunctiongit() {
window.open('https://github.com/jrbooth3')
;}
</script><br>
if ( $test == "1" ) {
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionDe()'>Call Jenkins to deploy Code</button>
<script>
function myFunctionDe() {
echo shell_exec("curl -X POST http://auto:11c2b82cd6caa3c9a53036d127ce5064c9@192.168.86.27:8083/job/dockerPreBuild/build?token=SKLDjflekjrtlk4j3lkjslkj4lk3PEKDG");
window.open('auto.php', 'target=_blank')
window.open('http://artemis:8083/job/dbNoderefresh/')
</script><br>
} else {
<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctiontestsite()'>Test site</button>
<script>
function myFunctiontestsite() {
window.open('http://artemis:81/')
;}
</script><br>
}
<script type="text/javascript">
 function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 600000);
    }
    window.onload = closeWindow();
    </script>
</body></html>
