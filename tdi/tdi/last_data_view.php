<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
include 'config.php';
?>

<table width="780"  border="2" cellpadding="2">
  <tr>
    <td>ID</td>
    <td>Year</td>
    <td>Model</td>
</tr>

<?php

include 'opendb.php';
$result2 = mysql_query("SELECT * FROM vehicle");
while ($row = mysql_fetch_array($result2,MYSQL_ASSOC)) {
print "<td>". $row{'vehicleid'}. "</td>" ;
print "  ";
print "<td>". $row{'year'}. "</td>" ;
print "  ";
print "<td>". $row{'model'}. "</td> </tr><br>" ;
}	
mysql_close($dbh);

?>

  </tr>
</table>
<table width="780"  border="2" cellpadding="2">
  <tr>
    <td>vehicle</td>
    <td>Mileage</td>
    <td>Date</td>
    <td>Gallons</td>
</tr>
<?php

include 'opendb.php';
$result = mysql_query("SELECT vehicle, mileage, date, gallons FROM tdi.rawdata ");
while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
print "<td>". $row{'vehicle'}. "</td>" ;
print "  ";
print "<td>". number_format ($row{'mileage'}). "</td>" ;
print "  ";
print "<td>". date ('n/j/Y' , strtotime($row{'date'})) . "</td>" ;
//print "<td>". date ('n/j/Y' $row{'date'}). "</td>" ;
print "  ";
print "<td>". number_format ($row{'gallons'}, 2). "</td>". "</tr>" ;
}
	
mysql_close($dbh);

?>

  </tr>
</table>
</body>
</html>
