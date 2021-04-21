<html>
 <head>
  <title>Database Sync Status</title>
 </head>
 <body>
<?php
$dbhost = "192.168.86.29";
$user = "postgres";
$db = "nwstatus";
$dbconn2 = pg_connect("host=$dbhost dbname=$db user=$user");
if (!$dbconn2) {
  echo "An error occurred.\n";
  exit;
}
echo "<table border=1>";
echo "<tr><th colspan='4'>Database Sync Status</th></tr>";
echo "<tr> <th> server </th> <th> min time</th><th> avg time </th><th> max time </th></tr>";
$sites = array("Saturn","venus","jupiter","neptune");
$times = array("30 minute","1 hour","2 hour","8 hour","24 hour", "48 hour");
$prcs = array("restore","backup");
#"3 month","6 month","12 month","24 month");
foreach ($times as $time) {
	$ltime=preg_replace('/\s+/', '', $time);
		echo "<tr><th colspan='4'>prev <a href=" . $ltime . "dbsync.php target=_blank> " . $time . "s</a></th></tr>";
		foreach ($prcs as $prc) {
                        echo "<tr><th colspan='4'>" . $prc . "</a></th></tr>";
			foreach ($sites as $site) {
				$sql = "SELECT server, min(time) as mintime, round(avg(time)::numeric,3) as avgtime, max(time) as maxtime from db_rep WHERE prc = '$prc' and date > ( NOW() - INTERVAL '$time') and server = '$site' group by server;";
				$result = pg_query($sql);
				while($myrow = pg_fetch_assoc($result)) {
				echo "<tr><td>".  $myrow['server'] . "</td><td>" . $myrow['mintime'] . "</td><td>" . $myrow['avgtime'] . "</td><td>" . $myrow['maxtime'] . "</td></tr>";
			}
		}
	}
}
echo "</table>";
header("Refresh:30");
?>
24 hour data by server <br>
<a href="saturn.php" target="_blank" >Saturn</a>
<a href="jupiter.php" target="_blank">Jupiter</a>
<a href="venus.php" target="_blank">Venus</a>
<a href="neptune.php" target="_blank">Neptune</a>
<br> 2 week avg data by server <br>
<a href="avgsaturn.php" target="_blank" >Saturn</a>
<a href="avgjupiter.php" target="_blank">Jupiter</a>
<a href="avgvenus.php" target="_blank">Venus</a>
<a href="avgneptune.php" target="_blank">Neptune</a>
<br> backup times 24 hour
<br> <a href="1hneptune.php" target="_blank">one hour Neptune </a>
</body>
</html>
