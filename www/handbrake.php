<html>
 <head>
  <title>App CPU temp</title>
 </head>
 <body>
<?php
header("refresh: 60;");
  //printf('hello world <br>');
$servername = "192.168.2.22";
$username = "jimbo";
$password = "jones";
$db = "nwstatus";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
echo "Database online";
$sqlh5 = "SELECT svrnm,app,MIN(cputemp),ROUND(AVG(cputemp),0),MAX(cputemp) FROM nwstatus.handbrake where timestamp >= DATE_SUB(NOW(), INTERVAL 6 hour) group by svrnm;";
$sqlh4 = "SELECT svrnm,app,MIN(cputemp),ROUND(AVG(cputemp),0),MAX(cputemp) FROM nwstatus.handbrake where timestamp >= DATE_SUB(NOW(), INTERVAL 5 minute) group by svrnm;";
$sqlh3 = "SELECT svrnm,app,MIN(cputemp),ROUND(AVG(cputemp),0),MAX(cputemp) FROM nwstatus.handbrake where timestamp >= DATE_SUB(NOW(), INTERVAL 15 minute) group by svrnm;";
$sqlh2 = "SELECT svrnm,app,MIN(cputemp),ROUND(AVG(cputemp),0),MAX(cputemp) FROM nwstatus.handbrake where timestamp >= DATE_SUB(NOW(), INTERVAL 1 hour) group by svrnm;";
$sqlh  = "SELECT svrnm,app,MIN(cputemp),ROUND(AVG(cputemp),0),MAX(cputemp) FROM nwstatus.handbrake where timestamp >= DATE_SUB(NOW(), INTERVAL 24 hour) group by svrnm;";
$resulth = $conn->query($sqlh);
$resulth2 = $conn->query($sqlh2);
$resulth3 = $conn->query($sqlh3);
$resulth4 = $conn->query($sqlh4);
$resulth5 = $conn->query($sqlh5);
echo "<table border=1>";
echo "<tr><th colspan='5'>CPU Temp by server</th></tr>";
echo "<tr><th colspan='5'>prev 5 minutes</th></tr>";
echo "<tr> <th> server </th> <th> app </th> <th> min temp</th><th> max temp </th><th> avg temp </th> </tr>";
while($row = $resulth4->fetch_assoc()) {
        echo "<tr> <td>". $row["svrnm"]. "</td> <td>". $row["app"]. "</td> <td>". $row["MIN(cputemp)"]. "</td> <td>" . $row["MAX(cputemp)"]. "</td> <td>" . $row["ROUND(AVG(cputemp),0)"]. "</td>  </tr>";
	}
echo "<tr><th colspan='5'> <a href='http://192.168.2.23/15mingraph.php'  target='_blank'>Prev 15 Minutes</a> </th></tr>";
echo "<tr> <th> server </th> <th> app </th> <th> min temp</th><th> max temp </th><th> avg temp </th> </tr>";
    while($row = $resulth3->fetch_assoc()) {
        echo "<tr> <td>". $row["svrnm"]. "</td> <td>". $row["app"]. "</td> <td>". $row["MIN(cputemp)"]. "</td> <td>" . $row["MAX(cputemp)"]. "</td> <td>" . $row["ROUND(AVG(cputemp),0)"]. "</td>  </tr>";
	}
echo "<tr><th colspan='5'>  <a href='http://192.168.2.23/1hourgraph.php'  target='_blank' >Prev 60 Minutes</a>  </th></tr>";
echo "<tr> <th> server </th> <th> app </th> <th> min temp</th><th> max temp </th><th> avg temp </th> </tr>";
    while($row = $resulth2->fetch_assoc()) {
        echo "<tr> <td>". $row["svrnm"]. "</td> <td>". $row["app"]. "</td> <td>". $row["MIN(cputemp)"]. "</td> <td>" . $row["MAX(cputemp)"]. "</td> <td>" . $row["ROUND(AVG(cputemp),0)"]. "</td> </tr>";
    	}
echo "<tr><th colspan='5'>  <a href='http://192.168.2.23/6hourgraph.php'  target='_blank'>Prev 6 hours</a>  </th></tr>";
echo "<tr> <th> server </th> <th> app </th> <th> min temp</th><th> max temp </th><th> avg temp </th> </tr>";
    while($row = $resulth5->fetch_assoc()) {
        echo "<tr> <td>". $row["svrnm"]. "</td> <td>". $row["app"]. "</td> <td>". $row["MIN(cputemp)"]. "</td> <td>" . $row["MAX(cputemp)"]. "</td> <td>" . $row["ROUND(AVG(cputemp),0)"]. "</td></tr>";
        }
echo "<tr><th colspan='5'>  <a href='http://192.168.2.23/24hourgraph.php'  target='_blank'>Prev 24 hours</a>  </th></tr>";
echo "<tr> <th> server </th> <th> app </th> <th> min temp</th><th> max temp </th><th> avg temp </th> </tr>";
    while($row = $resulth->fetch_assoc()) {
        echo "<tr> <td>". $row["svrnm"]. "</td> <td>". $row["app"]. "</td> <td>". $row["MIN(cputemp)"]. "</td> <td>" . $row["MAX(cputemp)"]. "</td> <td>" . $row["ROUND(AVG(cputemp),0)"]. "</td> </tr>";
    	}
echo "</table>"; 
// Close connection
$conn->close();
?>
</body>
</html>
