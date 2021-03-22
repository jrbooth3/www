<html>
 <head>
  <title>Network Device Status</title>
 </head>
 <body>
<?php
echo "<body style='background-color:black;'>";
echo "<font size='18'>";
echo "<font color='lightgreen'>";
function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
$prevdate = time();
$dbhost = "192.168.86.29";
$user = "jimbo";
$pw = "jones";
$db = "nwstatus";
$dbconn2 = pg_connect("host=$dbhost dbname=$db user=$user password=$pw");
if (!$dbconn2) {
  echo "An error occurred connecting to $dbhost \ $db \n";
  exit;
}
//echo "<br>";
echo "<font color='lightgreen'>";
$sql36h = "select name, date_trunc('minute', date at time zone 'america/chicago' ) as cleandate, status from svrstatus where date >= ( NOW() - INTERVAL '1 hour')  AND ( status != '' ) and (chg = '1') order by date;";
$result36h = pg_query($sql36h);
$sql36hct = "select count(*) from svrstatus where date >= ( NOW() - INTERVAL '1 hour')  AND ( status != '' ) and chg = '1';";
$result36hrows = pg_num_rows($result36h);
//echo "rows in status " . $result36hrows . " now"   ;
$sql60s = "select distinct  name, status FROM svrstatus where date >= (NOW() - INTERVAL '60 second' ) AND ( status != '' ) order by name ;";
$result60s = pg_query($sql60s);
echo "<table border=1";
//if ( $result36hrows < '1' ) {
//echo "no status changes";
//}
/*
echo "<th colspan='2'>Device Change Status</th>";
echo "<tr style='color:lightgreen'> <th> Device </th><th colspan='2'>DateTime</th> <th> Status</th><th>uptime</th></tr>";
if ( $result36hrows < '1' ) {
echo "<tr style='color:lightgreen'><td colspan = '5'> no device status changes </td></tr>";
}
while($myrow = pg_fetch_assoc($result36h)) { 
$newdate = $myrow['cleandate'];
$interval = (strtotime($newdate) - strtotime($prevdate)) / 60;
$uptime = convertToHoursMins($interval, '%02d h %02d m');
//echo "previous date was $prevdate up time $interval - $uptime <br>";
echo "<tr style='color:lightgreen'><td>" . $myrow['name']  . "</td><td colspan='2'>" . $myrow['cleandate'] . "</td><td>" . $myrow['status'] . "</td><td>";
$uptest = $myrow['status'];
//if ($uptest == "down" && $interval < "500" && $interval > "10") {
if ($uptest == "down") {
echo $uptime;
} else {
echo "";
}
echo "</td></tr>"; 
$prevdate = $myrow['cleandate'];
        }
*/
echo "<th colspan='5' style='color:lightgreen'>Device current Status</th>";
echo "<tr style='color:lightgreen'><th colspan='3'> Device </th><th colspan='2'> Status</th></tr>";
while($myrow = pg_fetch_assoc($result60s)) { 
echo "<tr style='color:lightgreen'><td colspan='3'>".$myrow['name'] . "</td><td colspan='2'>". $myrow['status'] . "</td></tr>"; 
        }
echo "</table>"; 
?>
</body>
</html>
