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
echo "Switches<br>";
echo "---Cisco<br>";
echo "------2960G 10/100/1000 48 port<br>";
echo "vlan0 switch ports 9-47 internal network<br>";
echo "vlan1 switch ports 1-8,48 internet facing<br>";
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
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionfw2()'>Router --> Lethe --> switch1</button>";
echo "<script>";
echo "function myFunctionfw2() {";
echo "window.open('https://lethe001')";
echo ";}";
echo "</script><br><br>";
echo "------PRO 2040 10/100 secondary<br>";
echo "<button style='font-size : 36px; background-color:lightgreen' onclick='myFunctionfw1()'>Router --> Styx --> switch2</button>";
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
    }, 60000);
    }
    window.onload = closeWindow();
    </script>
</body></html>
