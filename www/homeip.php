<html>
 <head>
  <title>Public IP</title>
 </head>
 <body>
<?php
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
$time_start = microtime_float();
$dbhost = "192.168.86.29";
$user = "postgres";
$db = "nwstatus";
$dbconn2 = pg_connect("host=$dbhost dbname=$db user=$user");
if (!$dbconn2) {
  echo "An error occurred.\n";
  exit;
}
echo "<br>";
echo "<table border=1>";
echo "<tr><th colspan='6'>Public IP changes</th></tr>";
echo "<tr><td>date</td><td>gateway</td><td>IPv4</td><td>IPv6  Address</td><td>Location</td><td>latitude & longitude</td></tr>";
//$sql = "select distinct on (ipv6) date_trunc('minute', date at time zone 'america/chicago' ) as cleandate, ip, ipv6, gw, loc, latlong from  homeip where date > ( NOW() - INTERVAL '24 hour') order by ipv6, date desc;;";
$sql = "select distinct on (ipv6) date_trunc('minute', date at time zone 'america/chicago' ) as cleandate, ip, ipv6, gw, loc, latlong from  homeip where date > ( NOW() - INTERVAL '60 minute') and ip != '' order by ipv6, date desc limit 5;";
//$sqlrecords = pg_num_rows($sql);
echo "<br>";
        $result = pg_query($sql);
                while($myrow = pg_fetch_assoc($result)) {
                echo "<tr><td>" . $myrow['cleandate'] . "</td><td>" . $myrow['gw'] . "</td><td>" . $myrow['ip'] . "</td><td>" . $myrow['ipv6'] . "</td><td>" . $myrow['loc'] . '</td>';
		echo '<td><a href="https://www.google.com/search?q=google+maps+'.$myrow['latlong'].'">'.$myrow['latlong'] . '</a></td></tr>';
		"<td>" . $myrow['latlong'] . "</td></tr>";
                };
echo "</table>"; 
//$result = pg_query($sqlrecords);
while($myrow = pg_fetch_assoc($result)) {
$records= $myrow['count'];
};
$time_end = microtime_float();
$time = $time_end - $time_start;
echo "<br>";
echo "full page load in " . round($time, 3) . " seconds";
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
