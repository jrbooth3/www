<html>
<head>
<title>Services Status</title>
</head>
<body>
<?php
header("refresh: 1000;");
$servername = "192.168.86.26";
$username = "jimbo";
$password = "jones";
$db = "nwstatus";
$conn = new mysqli($servername, $username, $password, $db);
$times = array("1","6","12","24");
$servers = array("mercury","venus","earth","mars","saturn","jupiter","neptune","jupiter","pluto");
foreach ($times as $time) {
	$sql1 = "SELECT service,datetime, ROUND(AVG(status),0) FROM nwstatus.services where datetime >= DATE_SUB(NOW(), INTERVAL $time hour) GROUP BY service;";
	$result1 = $conn->query($sql1);
	while($row = $result1->fetch_assoc()) {
		$svc = $row["service"];
		$svctime = $svc . $time;
		$$svctime = $row["ROUND(AVG(status),0)"];
	}
}
echo "<table border=1>";
echo "<tr><th colspan='5'>Services status</th></tr>";
echo "<tr><th colspan='1'>Service</th><th colspan='1'>prev 60 min</th><th colspan='1'>prev 6 hours</th><th colspan='1'>prev 12 hours</th><th colspan='1'>prev 24 hours</th></tr>";
$services = array("http","dhcp","mysql");
	foreach ($services as $svc) {
		echo "<th> " . $svc . "</th>";
		foreach ($times as $time) {
			$svct = $svc . $time;
			if ( ${$svct} > "1" ) {
				echo "<td>" . ${$svct}. "% </td>";
			} else {
				echo "<td> down </td>";
			}
		}
echo "</tr>";
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
    }, 30000);
    }

    window.onload = closeWindow();
    </script>
</body>
</html>
