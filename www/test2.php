<html>
 <head>
  <title>Network Device Status</title>
 </head>
 <body>
<body style='background-color:black;'>
<font size='120px'>
<font color='lightgreen'>
<?php
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
$sql60s = "select distinct  name, status FROM svrstatus where date >= (NOW() - INTERVAL '60 second' ) AND ( status != '' ) order by status ;";
$result60s = pg_query($sql60s);
echo "<table border=1";

echo "<th colspan='2' style='color:lightgreen; font-size:56px'>Device current Status</th>";
echo "<tr style='color:lightgreen'; font-size:56px><th colspan='2'> Device </th><th colspan='2'> Status</th></tr>";
while($myrow = pg_fetch_assoc($result60s)) { 
echo "<tr style='color:lightgreen; font-size:46px'><td colspan='3'>".$myrow['name'] . "</td><td colspan='2'>". $myrow['status'] . "</td></tr>"; 
        }
echo "</table>"; 
?>
</body>
</html>
