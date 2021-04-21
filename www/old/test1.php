<html>
 <head>
  <title>Web Site Status</title>
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
echo "<tr><th colspan='4'>Web Site Response Times</th></tr>";
$sites = array("Google","UofM","K12","GinaBooth.com","artemis","TDI","test-system");
$times = array("5 minute","1 hour","2 hour","8 hour");
#"3 month","6 month","12 month","24 month");
foreach ($times as $time) {
	$ltime=preg_replace('/\s+/', '', $time);
	
		echo "<tr><th colspan='4'>prev <a href=" . $ltime . "webresp.php target=_blank>" . $time . "</a></th></tr>";
		echo "<tr> <th> site </th> <th> min time</th><th> avg time </th><th> max time </th></tr>";
		foreach ($sites as $site) {
		$sql = "SELECT name, min(resptime) as mintime, round(avg(resptime)::numeric,3) as avgtime, max(resptime) as maxtime from status WHERE date > ( NOW() - INTERVAL '$time') and name = '$site' group by name;";
		$result = pg_query($sql);
			while($myrow = pg_fetch_assoc($result)) {
			echo "<tr><td>".  $myrow['name'] . "</td><td>" . $myrow['mintime'] . "</td><td>" . $myrow['avgtime'] . "</td><td>" . $myrow['maxtime'] . "</td></tr>";  
		}
	}
} 
echo "</table>"; 
?>
<script type="text/javascript">
 function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 15000);
    }
    window.onload = closeWindow();
    </script>
</body>
</html>
