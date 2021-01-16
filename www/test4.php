<html>
 <head>
  <title>Services Status</title>
 </head>
 <body>
<?php
#header("refresh: 60;");
$servername = "192.168.86.26";
$username = "jimbo";
$password = "jones";
$db = "nwstatus";
$conn = new mysqli($servername, $username, $password, $db);
$sql1 = "SELECT service,datetime, ROUND(AVG(status),0) FROM nwstatus.services where datetime >= DATE_SUB(NOW(), INTERVAL 1 hour) GROUP BY service;";
$result1 = $conn->query($sql1);
$sql4 = "SELECT service,datetime, ROUND(AVG(status),0) FROM nwstatus.services where datetime >= DATE_SUB(NOW(), INTERVAL 6 hour) GROUP BY service;";
$result4 = $conn->query($sql4);
$sql7 = "SELECT service,datetime, ROUND(AVG(status),0) FROM nwstatus.services where datetime >= DATE_SUB(NOW(), INTERVAL 12 hour) GROUP BY service;";
$result7 = $conn->query($sql7);
$sql10 = "SELECT service,datetime, ROUND(AVG(status),0) FROM nwstatus.services where datetime >= DATE_SUB(NOW(), INTERVAL 24 hour) GROUP BY service;";
$result10 = $conn->query($sql10);
while($row = $result1->fetch_assoc()) {
        $test1 = $row["service"];
	$test2 = $row["ROUND(AVG(status),0)"];
	if ( $test1 = "http" ) {
		$apache1 = $test2;
	} 
	if ( $test1 = "dhcp" ) {
		$dhcpd1 = $test2;
	} 
	if ( $test1 = "mysql" ) {
		$mysql1 = $test2;
	}
} 
while($row = $result4->fetch_assoc()) {
        $test1 = $row["service"];
	$test2 = $row["ROUND(AVG(status),0)"];
	if ( $test1 = "http" ) {
		$apache6 = $test2;
	} 
	if ( $test1 = "dhcp" ) {
		$dhcpd6 = $test2;
	} 
	if ( $test1 = "mysql" ) {
		$mysql6 = $test2;
	}
} 
while($row = $result7->fetch_assoc()) {
        $test1 = $row["service"];
	$test2 = $row["ROUND(AVG(status),0)"];
	if ( $test1 = "http" ) {
		$apache12 = $test2;
	} 
	if ( $test1 = "dhcp" ) {
		$dhcpd12 = $test2;
	} 
	if ( $test1 = "mysql" ) {
		$mysql12 = $test2;
	}
} 
while($row = $result10->fetch_assoc()) {
        $test1 = $row["service"];
	$test2 = $row["ROUND(AVG(status),0)"];
	if ( $test1 = "http" ) {
		$apache24 = $test2;
	} 
	if ( $test1 = "dhcp" ) {
		$dhcpd24 = $test2;
	} 
	if ( $test1 = "mysql" ) {
		$mysql24 = $test2;
	}
} 
echo "<table border=1>";
echo "<tr><th colspan='5'>Services status</th></tr>";
echo "<tr><th colspan='1'>Service</th><th colspan='1'>prev 60 min</th><th colspan='1'>prev 6 hours</th><th colspan='1'>prev 12 hours</th><th colspan='1'>prev 24 hours</th></tr>";
$times = array("1", "6", "12", "24");
$services = array("http", "dhcp", "mysql");
$servers = array("mercury","venus","earth","mars","saturn","jupiter","neptune","pluto");
foreach ($services as $svc) {
	echo "<tr> <th colspan='1'>" . $svc . "</th>";
		foreach ($times as $time) {
			$svctime = $svc . $time;
			echo "<th colspan='1'>" . ${$svctime}. "% </th>";
		}
echo "/<tr>";
}
echo "</tr>";

echo "</table>";
// Close connection
$conn->close();
?>
<script type="text/javascript">
 function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 3000);
    }

    window.onload = closeWindow();
    </script>
</body>
</html>
