<html>
 <head>
  <title>Services Status</title>
 </head>
 <body>
<?php
header("refresh: 300;");
$servername = "192.168.86.26";
$username = "jimbo";
$password = "jones";
$db = "nwstatus";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
$today = date("Y-m-d");
$sql1 = "SELECT service,datetime, ROUND(AVG(status),0) FROM nwstatus.services where datetime >= DATE_SUB(NOW(), INTERVAL 60 minute) GROUP BY service;";
$result1 = $conn->query($sql1);
$sql2 = "SELECT server, service, ROUND(AVG(status),0) FROM nwstatus.services where service='MySQL' and datetime >= DATE_SUB(NOW(), INTERVAL 60 minute) GROUP BY server;";
$result2 = $conn->query($sql2);
$sql3 = "SELECT server, service, ROUND(AVG(status),0) FROM nwstatus.services where service='apache' and datetime >= DATE_SUB(NOW(), INTERVAL 60 minute) GROUP BY server;";
$result3 = $conn->query($sql3);
$sql4 = "SELECT service,datetime, ROUND(AVG(status),0) FROM nwstatus.services where datetime >= DATE_SUB(NOW(), INTERVAL 6 hour) GROUP BY service;";
$result4 = $conn->query($sql4);
$sql5 = "SELECT server, service, ROUND(AVG(status),0) FROM nwstatus.services where service='MySQL' and datetime >= DATE_SUB(NOW(), INTERVAL 6 hour) GROUP BY server;";
$result5 = $conn->query($sql5);
$sql6 = "SELECT server, service, ROUND(AVG(status),0) FROM nwstatus.services where service='apache' and datetime >= DATE_SUB(NOW(), INTERVAL 6 hour) GROUP BY server;";
$result6 = $conn->query($sql6);
$sql7 = "SELECT service,datetime, ROUND(AVG(status),0) FROM nwstatus.services where datetime >= DATE_SUB(NOW(), INTERVAL 12 hour) GROUP BY service;";
$result7 = $conn->query($sql7);
$sql8 = "SELECT server, service, ROUND(AVG(status),0) FROM nwstatus.services where service='MySQL' and datetime >= DATE_SUB(NOW(), INTERVAL 12 hour) GROUP BY server;";
$result8 = $conn->query($sql8);
$sql9 = "SELECT server, service, ROUND(AVG(status),0) FROM nwstatus.services where service='apache' and datetime >= DATE_SUB(NOW(), INTERVAL  12 hour) GROUP BY server;";
$result9 = $conn->query($sql9);
$sql10 = "SELECT service,datetime, ROUND(AVG(status),0) FROM nwstatus.services where datetime >= DATE_SUB(NOW(), INTERVAL 24 hour) GROUP BY service;";
$result10 = $conn->query($sql10);
$sql11 = "SELECT server, service, ROUND(AVG(status),0) FROM nwstatus.services where service='MySQL' and datetime >= DATE_SUB(NOW(), INTERVAL 24 hour) GROUP BY server;";
$result11 = $conn->query($sql11);
$sql12 = "SELECT server, service, ROUND(AVG(status),0) FROM nwstatus.services where service='apache' and datetime >= DATE_SUB(NOW(), INTERVAL 24 hour) GROUP BY server;";
$result12 = $conn->query($sql12);
echo "<table border=1>";
echo "<tr><th colspan='8'>Services status</th></tr>";

echo "<tr><th colspan='8'>MySQL status</th></tr>";
echo "<tr><th colspan='2'>prev 60 min</th><th colspan='2'>prev 6 hours</th><th colspan='2'>prev 12 hours</th><th colspan='2'>prev 24 hours</th></tr>";
echo "<tr> <th colspan='1'> server </th> <th colspan='1'> avg up % </th> </tr>";
while($row = $result2->fetch_assoc()) {
        echo "<tr> <td colspan='1'>". $row["server"]. "</td> <td colspan='1'>". $row["ROUND(AVG(status),0)"]. "</td>  </tr>";
}

echo "<tr><th colspan='8'>Apache status</th></tr>";
echo "<tr><th colspan='2'>prev 60 min</th><th colspan='2'>prev 6 hours</th><th colspan='2'>prev 12 hours</th><th colspan='2'>prev 24 hours</th></tr>";
echo "<tr> <th colspan='1'> server </th> <th colspan='1'> avg up % </th> </tr>";
while($row = $result3->fetch_assoc()) {
        echo "<tr> <td colspan='1'>". $row["server"]. "</td> <td colspan='1'>". $row["ROUND(AVG(status),0)"]. "</td>  </tr>";
}

echo "</table>"; 
// Close connection
$conn->close();
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
