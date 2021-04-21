<html>
<head>
<title>Services Status</title>
</head>
<body>
<?php
$dbhost = "192.168.86.29";
$user = "postgres";
$db = "nwstatus";
$dbconn2 = pg_connect("host=$dbhost dbname=$db user=$user password=$pw");
if (!$dbconn2) {
  echo "An error occurred.\n";
  exit;
} else {
  echo "DB is up <br>";
}
$services = array("http","mysql","postgresql");
$servers = array("artemis","apollo","neptune");
foreach ($services as $service) {
	foreach ($servers as $server) {
		$sql1 = "SELECT ROUND(AVG(status),0) as avgr FROM services where date >= ( NOW() - INTERVAL '1 hour') and service = '$service' and server ='$server' ;";
		$result1 = pg_query($sql1);
		//echo "server $server running $service  <br>";
		while($row = pg_fetch_assoc($result1)) {
			$svc = $service;
			$svr = $server;
			$status = $row['avgr'];
				if ( $status > 50 ) {
				echo "server $svr running $svc has an uptime of $status% <br>";
				}
		}
	}
}
//echo "<table border=1>";
//echo "<tr><th colspan='5'>Services status</th></tr>";
//echo "<tr><th colspan='1'>Service</th><th colspan='1'>prev 60 min</th><th colspan='1'>prev 6 hours</th><th colspan='1'>prev 12 hours</th><th colspan='1'>prev 24 hours</th></tr>";
//foreach ($services as $svc) {
//	echo "<tr> <th colspan='1'>" . $svc . "</th>";
//		foreach ($times as $time) {
//			$svct = $svc . $time;
//			echo "<td>" . ${$svct}. "% </td>";
//		}
//echo "/<tr>";
//}



//foreach ($services as $svc) {
//		echo "<th> " . $svc . "</th>";
//		foreach ($times as $time) {
//			$svct = $svc . $time;
//			if ( ${$svct} > "1" ) {
//				echo "<td>" . ${$svct}. "% </td>";
//			} else {
//				echo "<td> down </td>";
//			}
//		}
//echo "</tr>";
//	}
//echo "</table>";

// Close connection
//$conn->close();
?>
<script type="text/javascript">
 function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 30000);
    }

    window.onload = closeWindow();
    </script>
<p>
<button onclick="myFunctiond()">Network Services details</button>
<script>
function myFunctiond() {
    window.open("test6.php", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=550, height=550");
}
</script>
</p>
</body>
</html>
