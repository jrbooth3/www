<?php // content="text/plain; charset=utf-8"
header("refresh: 60;");
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
$servername = "192.168.2.22";
$username = "jimbo";
$password = "jones";
$db = "nwstatus";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
//echo "Database online";
$sqlh4 = "SELECT cputemp FROM nwstatus.handbrake where svrnm = 'artemis' and timestamp >= DATE_SUB(NOW(), INTERVAL 15 minute);";
$sqlh3 = "SELECT cputemp FROM nwstatus.handbrake where svrnm = 'apollo'  and timestamp >= DATE_SUB(NOW(), INTERVAL 15 minute);";
$resulth4= $conn->query($sqlh4);
while($row = $resulth4->fetch_assoc()) {
$data[] = $row["cputemp"];
}
$datay1 = $data;
$resulth3= $conn->query($sqlh3);
while($row = $resulth3->fetch_assoc()) {
$data2[] = $row["cputemp"];
}
$datay1 = $data;
$datay2 = $data2;

// Setup the graph
$graph = new Graph(1440,750);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Filled Y-grid');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
//$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('artemis');

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('apollo');

// Create the third line
//$p3 = new LinePlot($datay3);
//$graph->Add($p3);
//$p3->SetColor("#FF1493");
//$p3->SetLegend('Line 3');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();
$conn->close();
?>

