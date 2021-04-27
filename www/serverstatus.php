<html><body>
<body style='background-color:black;'>
<font size='24'>
<font color='lightgreen'>
<table border=2> 
<?php
$port=$_SERVER['SERVER_PORT'];
$serverip=$_SERVER['SERVER_ADDR'];
if ( $port == 81 ) {
echo "<font color='red'>------test system------<font color='lightgreen'><br>";
$test=1;
}
?>
<th colspan=3 style='color:lightgreen; font-size:60px' >Device Architecture</th>
<tr style='color:lightgreen'><td style='font-size : 46px;'>ARCH=ARM32</td><td  style='font-size : 46px;'>ARCH=ARM64</td><td  style='font-size : 46px;'>ARCH=AMD64</td></tr>
<tr style='color:lightgreen'>
<td style='font-size : 36px;'><button style='font-size:36px; color:lightgreen; background-color:black' onclick='myFunctionvenus()'>Venus status pages</button><script> function myFunctionvenus() {window.open('http://venus:19999')}</script></td>
<td style='font-size : 36px;'><button style='font-size:36px; color:lightgreen; background-color:black' onclick='myFunctionpluto()'>Pluto status pages</button><script> function myFunctionpluto() {window.open('http://pluto:19999')}</script></td>
<td style='font-size : 36px;'><button style='font-size:36px; color:lightgreen; background-color:black' onclick='myFunctionapollo()'>Apollo status pages</button><script> function myFunctionapollo() {window.open('http://apollo:19999')}</script></td>
</tr>
<td style='font-size : 36px;'><button style='font-size:36px; color:lightgreen; background-color:black' onclick='myFunctionsaturn()'>Saturn status pages</button><script> function myFunctionsaturn() {window.open('http://saturn:19999')}</script></td>
<td style='font-size : 36px;'><button style='font-size:36px; color:lightgreen; background-color:black' onclick='myFunctionandromeda()'>Andromeda status pages</button><script> function myFunctionandromeda() {window.open('http://andromeda:19999')}</script></td>
<td style='font-size : 36px;'><button style='font-size:36px; color:lightgreen; background-color:black' onclick='myFunctionartemis()'>Artemis status pages</button><script> function myFunctionartemis() {window.open('http://artemis:19999')}</script></td>
</tr>
<td style='font-size : 36px;'><button style='font-size:36px; color:lightgreen; background-color:black' onclick='myFunctionneptune()'>Neptune status pages</button><script> function myFunctionneptune() {window.open('http://neptune:19999')}</script></td>
<td style='font-size : 36px;'><button style='font-size:36px; color:lightgreen; background-color:black' onclick='myFunctionmilkyway()'>Milkyway status pages</button><script> function myFunctionmilkyway() {window.open('http://milkyway:19999')}</script></td>
<td style='font-size : 36px;'><button style='font-size:36px; color:lightgreen; background-color:black' onclick='myFunctionmars()'>Mars status pages</button><script> function myFunctionmars() {window.open('http://mars:19999')}</script></td>
</tr>
</table> 

</html></body>
