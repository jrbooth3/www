<head>
<title>TDI Fuel and Maintenance</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<table width="780"  border="2" cellpadding="2">
	<tr>
		<td><img src="header.JPG"></td>
	</tr>
</table>
<?php
$port = $_SERVER['SERVER_PORT'];
include 'opendb.php';
if ( $test == 1 ) {
echo "<font color=red>----------------TEST SYSTEM------------------</font>";
}
/*include 'opendbjup.php';
$resultjup = mysqli_query($conjup, "select count(*) FROM tdi.rawdata;");
$rowjup = mysqli_fetch_row($resultjup);
$rowcntjup = $rowjup[0];
mysqli_close($conjup);
*/
include 'opendb.php';
$resultnep = mysqli_query($conprd, "select count(*) FROM tdi.rawdata;");
$rownep = mysqli_fetch_row($resultnep);
$rowcntnep = $rownep[0];
mysqli_close($conprd);
include 'opendbsat.php';
$resultsat = mysqli_query($consat, "select count(*) FROM tdi.rawdata;");
$rowsat = mysqli_fetch_row($resultsat);
$rowcntsat = $rowsat[0];
mysqli_close($consat);
include 'opendbven.php';
$resultven = mysqli_query($conven, "select count(*) FROM tdi.rawdata;");
$rowven = mysqli_fetch_row($resultven);
$rowcntven = $rowven[0];
mysqli_close($conven);
if (($rowcntsat == $rowcntnep) && ($rowcntven == $rowcntnep)) { 
//if (($rowcntjup == $rowcntsat) && ($rowcntsat == $rowcntnep) && ($rowcntven == $rowcntnep)) { 
$status = '<font color="green">DB sync</font>';
$dbstatus = 1;
//header("Refresh:60");
} else {
$status = '<font color="red">DB sync error</font>';
$dbstatus = 0;
//header("Refresh 60");
}
?>
<br><b>Fuel data</b>
<table width="780"  border="2" cellpadding="2">
<tr>
<td width="150"><a href="data.php">Add Fuel Data</a></td>
<td width="150"><p><a href="fueldata-removal.php">Remove fuel data</a></p></td>
<td width="150"><a href="fueldata4.php">View all fuel entries</a></td>
</tr><tr>
<td width="150"><a href="mileage4.php">Mileage</a></td>
<td width="150"><p><a href="mileage3.php">All fuel mileage</a></p></td>
</tr>
</table>
<b>Maintenance Items</b>
<table width="780"  border="2" cellpadding="2">
<tr>
<td width="150"><a href="maintenance.php">Add Maintenance</a></td>
<td width="150"><a href="maintenance-removal.php">Remove maintenance</a></td>
<td width="150"><a href="maintenance3.php"> View Maintenance Entries</a></td>
</tr><tr>
<td width="150"><p><a href="static.php">Add maintenance static values</a></p></td>
<td width="150"><p><a href="static-removal.php">Removal of maintenance static values</a></p></td>
<td width="150"><a href="static_view.php">View maintenance static values</a></td>
</tr><tr>
<td width="150"><a href="maintenance4.php">View all maintenance</a></td>
<td width="150"><a href="maintenance5.php">View total maintenance costs by item</a></td>
<td width="150"><a href="maintenance_due3.php">Maintenance Due Dates</a></td>
</tr>
</table>
<b>Vehicles</b>
<table width="780"  border="2" cellpadding="2">
<tr>
<td width="150"><p><a href="vehicle.php">Add vehicle</a></p></td>
<td width="150"><p><a href="vehicle-removal.php">Removal of vehicles</a></p></td>
<td width="150"><p><a href="vehicle_view.php">View vehicles</a></p></td>
</tr><tr>
</table>
<b>Vendors</b>
<table width="780"  border="2" cellpadding="2">
<tr>
<td width="150"><p><a href="vendor_add.php">Add vendor</a></p></td>
<td width="150"><p><a href="vendor_removal.php">Remove vendors</a></p></td>
<td width="150"><p><a href="vendor_view.php">View vendors</a></p></td>
<td width="150"><p><a href="vendor_payments.php">View vendor payments</a></p></td>
</tr>
</table>
<b>System stats</b>
<table width="780" border="2" cellspacing="2" cellpadding="2">
<tr>
<?php
include 'opendb.php';
print "<td width=150>Datebase host name<br>" . $hostname . " </a></td>";
print "<td width=150>Database connection status</td><td>" . $status;
if ($dbstatus == 0) {
/*
print "</td></tr><tr><td width=150>Neptune</td><td>Saturn</td><td width=150>Jupiter</td><td width=150>Venus</td></tr>";
print "<tr><td width=150> " . $rowcntnep . "</td><td width=150>" . $rowcntsat . "</td><td width=150>" . $rowcntjup . " </a></td> <td width=150>" . $rowcntven . " </a></td></tr></table>";
*/
print "</td></tr><tr><td width=150>Neptune</td><td>Saturn</td><td width=150>Venus</td></tr>";
print "<tr><td width=150> " . $rowcntnep . "</td><td width=150>" . $rowcntsat . "</td> <td width=150>" . $rowcntven . " </a></td></tr></table>";
} else {
print "</td></tr></table>";
}
print "<br>";
?>
