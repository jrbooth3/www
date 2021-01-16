<html>
 <head>
  <title>Web site and DNS Status</title>
 </head>
 <body>
<?php
$dbhost = "neptune";
$user = "postgres";
$db = "nwstatus";
$dbconn2 = pg_connect("host=$dbhost dbname=$db user=$user password=$pw");
if (!$dbconn2) {
  $postgresneptune="down";
} else {
  $postgresneptune="up";
}
$dbhost = "artemis";
$user = "postgres";
$db = "nwstatus";
$dbconn2 = pg_connect("host=$dbhost dbname=$db user=$user password=$pw");
if (!$dbconn2) {
  $postgresartemis="down";
} else {
  $postgresartemis="up";
}
$servername = "apollo";
$username = "jimbo";
$password = "jones";
$db = "nwstatus";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
if (!$conn) {
  $mysqlapollo="down";
} else {
  $mysqlapollo="up";
}
$servername = "artemis";
$username = "jimbo";
$password = "jones";
$db = "nwstatus";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
if (!$conn) {
  $mysqlartemis="down";
} else {
  $mysqlartemis="up";
}
echo "<table border=1>";
echo "<tr><th colspan='3'>database status</th></tr>";
echo "<tr> <th> Server </th> <th> db </th><th> status </th></tr>";
echo "<tr> <th> Neptune </th> <th> PostgreSQL </th><th>" . $postgresneptune . "</th></tr>";
echo "<tr> <th> Artemis </th> <th> PostgreSQL </th><th>" . $postgresartemis . "</th></tr>";
echo "<tr> <th> Artemis </th> <th> MySQL </th><th>" . $mysqlartemis . "</th></tr>";
echo "<tr> <th> Apollo </th> <th> MySQL </th><th>" . $mysqlapollo . "</th></tr>";
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
