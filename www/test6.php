<html>
<head>
<title>Services Status</title>
</head>
<script type="text/javascript">
 function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 60000);
    }

    window.onload = closeWindow();
    </script>
<body>
<?php
header("refresh: 300;");
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
$times = array("1 hour","6 hour");
$services = array("http","mysql");
$servers = array("pluto");
foreach ($servers as $server) {
	foreach ($services as $service) {
		foreach ($times as $tim) {
			$sql1 = "SELECT ROUND(AVG(status),0) as avgr FROM services where date >= ( NOW() - INTERVAL '$tim') and service = '$service' and server ='$server' ;";
			$result1 = pg_query($sql1);
			//echo "server $server running $service  <br>";
			while($row = pg_fetch_assoc($result1)) {
				$svc = $service;
				$svr = $server;
				$status = $row['avgr'];
				if ( $status > 50 ) {
				echo "server $svr running $svc has an uptime of $status% appears up for $tim<br>";
				} else {
				echo "server $svr running $svc has an uptime of $status% seems down for $tim<br>";
				}
			}
		}
	}
}
?>

