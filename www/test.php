<html>
 <head>
  <title>Web site response times</title>
 </head>
 <body>
<?php
header("refresh: 30;");
  //printf('hello world <br>');
$servername = "192.168.2.22";
$username = "jimbo";
$password = "jones";
$db = "nwstatus";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
$today = date("Y-m-d");
echo "Database online ";
//echo "<br>";
$sql8 = "SELECT name,MIN(resptime),ROUND(AVG(resptime),3),MAX(resptime) FROM status where datetime >= DATE_SUB(NOW(), INTERVAL 8 hour) GROUP BY name;";
$result8 = $conn->query($sql8);
$sql = "SELECT name,MIN(resptime),ROUND(AVG(resptime),3),MAX(resptime) FROM status where datetime >= DATE_SUB(NOW(), INTERVAL 15 minute) GROUP BY name;";
$result = $conn->query($sql);
$sql2 = "SELECT name,MIN(resptime),ROUND(AVG(resptime),3),MAX(resptime) FROM status where datetime >= DATE_SUB(NOW(), INTERVAL 60 minute) GROUP BY name;";
$result2 = $conn->query($sql2);
$sql3 = "SELECT name,MIN(resptime),ROUND(AVG(resptime),3),MAX(resptime) FROM status where datetime >= DATE_SUB(NOW(), INTERVAL 5 minute) GROUP BY name;";
$result3 = $conn->query($sql3);
$sql4 = "SELECT MAX(datetime) FROM status;";
$result4 = $conn->query($sql4);
#$sql5 = "select name, date, status, chg from svrstatus where chg = '1' order by name, date and date >= DATE_SUB(NOW(), INTERVAL 24 hour);";
$sql5 = "select name, DATE(NOW()), date(date), time(date), date, status from svrstatus where date >= DATE_SUB(NOW(), INTERVAL 36 hour) and chg = '1' order by date;";
$result5 = $conn->query($sql5);
$sql6 = "select name, status from dnsstatus where date >= DATE_SUB(NOW(), INTERVAL 1 minute) group by name;";
$result6 = $conn->query($sql6);
$sql7 = "SELECT name,status FROM nwstatus.svrstatus order by date desc limit 8;";
$result7 = $conn->query($sql7);
while($row = $result4->fetch_assoc()) {
        echo $row["MAX(datetime)"];
    }
echo "<table border=1>";
echo "<tr><th colspan='4'>Web Site Response Times</th></tr>";
echo "<tr><th colspan='4'>prev 5 min</th></tr>";
echo "<tr> <th> site </th> <th> min time</th><th> max time </th><th> avg time </th> </tr>";
while($row = $result3->fetch_assoc()) {
        echo "<tr> <td>". $row["name"]. "</td> <td>". $row["MIN(resptime)"]. "</td> <td>" . $row["MAX(resptime)"]. "</td> <td>" . $row["ROUND(AVG(resptime),3)"]. "</td>  </tr>";
    }
echo "<th colspan='4'>prev 15 min </th>";
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td>". $row["name"]. "</td> <td>". $row["MIN(resptime)"]. "</td> <td>" . $row["MAX(resptime)"]. "</td> <td>" . $row["ROUND(AVG(resptime),3)"]. "</td>  </tr>";
    }
echo "<th colspan='4'><a href='http://192.168.2.23/1hourwebresp.php'  target='_blank'>Prev 1 hour</th>";
    while($row = $result2->fetch_assoc()) {
        echo "<tr> <td>". $row["name"]. "</td> <td>". $row["MIN(resptime)"]. "</td> <td>" . $row["MAX(resptime)"]. "</td> <td>" . $row["ROUND(AVG(resptime),3)"]. "</td> </tr>";
    }
echo "<th colspan='4'><a href='http://192.168.2.23/8hourwebresp.php'  target='_blank'>Prev 8 hours</th>";
    while($row = $result8->fetch_assoc()) {
        echo "<tr> <td>". $row["name"]. "</td> <td>". $row["MIN(resptime)"]. "</td> <td>" . $row["MAX(resptime)"]. "</td> <td>" . $row["ROUND(AVG(resptime),3)"]. "</td> </tr>";
    }
//echo "</table>"; 
//echo "<br>";
//echo "<table border=1>";
echo "<th colspan='4'>Device change Status</th>";
echo "<tr> <th> Device </th><th colspan='2'>DateTime</th> <th> Status</th></tr>";
while($row = $result5->fetch_assoc()) {
       if ($today > $row["date(date)"]) {
#		echo "<tr> <td> today " . $today . " date of event " . $row["date(date)"] . "</td></tr>";
		echo "<tr> <td>". $row["name"]. "</td><td colspan='2'> yesterday ". $row["time(date)"]. "</td> <td>" . $row["status"]. "</td></tr>";
	}
	else
	{
#               echo "<tr> <td> today ". $today . " date of event " . $row["date(date)"] . "</td></tr>";
		echo "<tr> <td>". $row["name"]. "</td><td colspan='2'> today ". $row["time(date)"]. "</td> <td>" . $row["status"]. "</td></tr>";
	}	
}
echo "<th colspan='4'>Device current Status</th>";
echo "<tr> <th colspan='2'> Device </th><th colspan='2'> Status</th></tr>";
while($row = $result7->fetch_assoc()) {
                echo "<tr> <td colspan='2'>". $row["name"]."</td> <td colspan='2'>". $row["status"]."</td>  </tr>";
}

echo "<th colspan='4'>DNS status</th>";
echo "<tr> <th colspan='2'> Device </th> <th colspan='2'> Status</th></tr>";
while($row = $result6->fetch_assoc()) {
        echo "<tr> <td colspan='2'>". $row["name"]. "</td> <td colspan='2'>". $row["status"]. "</td>  </tr>";
    }
echo "</table>"; 
// Close connection
$conn->close();
?>
</body>
</html>
