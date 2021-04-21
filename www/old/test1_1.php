<html>
 <head>
  <title>DNS Status</title>
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
} else {
  echo "DB is up <br>";
}
//$sites = array("@8.8.8.8","@8.8.4.4","@24.220.0.10","@24.220.0.11","@192.168.86.20","@192.168.86.23","@192.168.86.24","@192.168.86.29","@192.168.86.28");
//$sites = array("@1.1.1.1","@1.0.0.1","@8.8.8.8","@8.8.4.4","@24.220.0.10","@24.220.0.11","@192.168.86.20","@192.168.86.21","@192.168.86.23","@192.168.86.25", "@192.168.86.20 #54","@192.168.86.21 #54","@192.168.86.23 #54","@192.168.86.25 #54","@192.168.86.20 #5054","@192.168.86.21 #5054","@192.168.86.23 #5054","@192.168.86.25 #5054");
//$sites = array("@192.168.86.20","@192.168.86.21","@192.168.86.27","@192.168.86.32","@192.168.86.20 #54","@192.168.86.21 #54","@192.168.86.20 #5054");
$sites = array("@192.168.86.20","@192.168.86.21","@192.168.86.27","@192.168.86.32","@192.168.86.20 #5054");
$times = array("5 minute","1 hour","2 hour","8 hour");
//$sites = array("@8.8.8.8");
//$times = array("8 hour");
echo "<table border=1>";
echo "<tr><th colspan='2'>DNS Status</th></tr>";
foreach ($times as $time) {
switch  ($time){
case "5 minute":
        $MIN=5 ;
	break;
case "1 hour":
        $MIN=60;
	break;
case "2 hour":
        $MIN=120 ;
	break;
case "8 hour":
        $MIN=480;
	break;
}
	$ltime=preg_replace('/\s+/', '', $time);
	echo "<tr><th>prev " .  $time . "</th><th> uptime % </th></tr>";
		foreach ($sites as $site) {
			$sqlup = "SELECT * from  dnsstatus WHERE date > ( NOW() - INTERVAL '$time') and status = 'up' and name = '$site';";
			$sqldown = "SELECT * from  dnsstatus WHERE date > ( NOW() - INTERVAL '$time') and status = 'down' and name = '$site';";
			$resultu = pg_query($dbconn2, $sqlup);
			$resultd = pg_query($dbconn2, $sqldown);
			$up = pg_num_rows($resultu);
			$down = pg_num_rows($resultd);
			//echo "up is " . $up . " ";
			//echo "down is " , $down . " "":
			$uptime=($up / $MIN) * 100;
			if ($uptime > 100 ) {
				$uptime = 100;
			}
			//echo "TIme up " . $up . " down " . $down . "perct =" . $uptime .  "<br>" ;
			echo "<tr><td>prev" .  $site . "</td><td>" . round($uptime) . "</td></tr>";
			//echo "the dns uptime for $site is $uptime% for the past $time<br>";				
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
