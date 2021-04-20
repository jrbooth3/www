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
$test = 1;
}
echo "<br><br>--Tools--";
echo "<br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionJenk()'>Jenkins</button>";
echo "<script>";
echo "function myFunctionJenk() {";
echo "window.open('http://artemis:8083')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionviz()'>Docker Swarm Status</button>";
echo "<script>";
echo "function myFunctionviz() {";
echo "window.open('http://artemis:85/')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionb()'>Network Device status </button>";
echo "<script>";
echo "function myFunctionb() {";
echo "window.open('test2.php')";
echo ";}";
echo "</script><br><br>";
echo "Network<br><br>";
echo "Topology<br>";
echo "IP address Lethe001/X0=10.0.0.1<br>";
echo "IP address Lethe001/X1=dynamic from router<br>";
echo "IP address Lethe001/X2=192.168.86.4<br><br>";
echo "IP address Styx0001/X0=192.168.86.3<br>";
echo "IP address Styx0001/X1=dynamic router<br><br>";
echo "IP address Google wifi (acheron)192.168.86.1 <br>";
echo "IP address Google internet 10.0.0.2<br>";
echo "IP address Netgear NightHawk <br><br>";
echo "router > switch1/vlan1 > TOR wifi router advertised name Lethe PorkPie321<br>";
echo "router > switch1/vlan1 > Lethe001/X1 > Lethe001/X0 > Google mesh internet<br>";
echo "router > switch1/vlan1 > Lethe001/X1 > Lethe001/X2 > switch1/vlan0 for port forwarding<br>";
echo "router > switch2/vlan1 > Styx0001/X1 > Styx0001/X0 > switch2/vlan0<br><br>";
echo "vlan0 switch ports 9-47 internal network<br>";
echo "vlan1 switch ports 1-8,48 internet facing<br><br>";
echo "Google mesh wifi network on switch1 vlan0<br>";
echo "Google mesh internet network Lethe001/X0<br>";
echo "Netgear NightHawk wifi network on switch2 vlan0<br><br>";
echo "Switches<br>";
echo "---Cisco<br>";
echo "------2960G 10/100/1000 48 port<br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionsw1()'>Switch1</button>";
echo "<script>";
echo "function myFunctionsw1() {";
echo "window.open('http://switch1')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionsw2()'>Switch2</button>";
echo "<script>";
echo "function myFunctionsw2() {";
echo "window.open('http://switch2')";
echo ";}";
echo "</script><br><br>";
echo "firewalls<br>";
echo "---SonicWall<br>";
echo "------PRO 5060 10/100/1000 primary<br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionfw2()'>Lethe001</button>";
echo "<script>";
echo "function myFunctionfw2() {";
echo "window.open('https://lethe001')";
echo ";}";
echo "</script><br>";

echo "------PRO 2040 10/100 secondary<br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionfw1()'>Styx0001</button>";
echo "<script>";
echo "function myFunctionfw1() {";
echo "window.open('https://styx0001')";
echo ";}";
echo "</script><br><br>";

echo "--Systems--<br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionnet()'>System's status pages</button>";
echo "<script>";
echo "function myFunctionnet() {";
echo "window.open('serverstatus.php')";
echo ";}";
echo "</script><br><br>";
echo "--Development sites--<br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctiondockerhub()'>Docker Hub</button>";
echo "<script>";
echo "function myFunctiondockerhub() {";
echo "window.open('https://hub.docker.com/')";
echo ";}";
echo "</script><br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctiongit()'>GIT</button>";
echo "<script>";
echo "function myFunctiongit() {";
echo "window.open('https://github.com/jrbooth3')";
echo ";}";
echo "</script><br>";
if ( $test == "1" ) {
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionDe()'>Call Jenkins to deploy Code</button>";
echo "<script>";
echo "function myFunctionDe() {";
echo shell_exec("curl -X POST http://auto:11c2b82cd6caa3c9a53036d127ce5064c9@192.168.86.27:8083/job/dockerPreBuild/build?token=SKLDjflekjrtlk4j3lkjslkj4lk3PEKDG");
echo "window.open('auto.php', 'target=_blank')";
echo "window.open('http://artemis:8083/job/dbNoderefresh/')";
echo "</script><br>";
} else {
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctiontestsite()'>Test site</button>";
echo "<script>";
echo "function myFunctiontestsite() {";
echo "window.open('http://artemis:81/')";
echo ";}";
echo "</script><br>";
}
?>
<script type="text/javascript">
 function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 600000);
    }
    window.onload = closeWindow();
    </script>
</body></html>
