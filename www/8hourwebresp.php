<?php // content="text/plain; charset=utf-8"
header("refresh: 60;");
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');
$dbhost = "192.168.86.29";
$user = "postgres";
$db = "nwstatus";
$pw = "postgres";
$dbconn2 = pg_connect("host=$dbhost dbname=$db user=$user password=$pw");
$sqlh4 = "SELECT resptime FROM status where date >= (NOW() - INTERVAL '8 hour') and name = 'K12';";
$sqlh3 = "SELECT resptime FROM status where date >= (NOW() - INTERVAL '8 hour') and name = 'Google';";
$resulth4= pg_query($sqlh4);
while($row = pg_fetch_assoc($resulth4)) {
$data[] = $row["resptime"];
}
$datay1 = $data;
$resulth3= pg_query($sqlh3);
while($row = pg_fetch_assoc($resulth3)) {
$data2[] = $row["resptime"];
}
$datay1 = $data;
$datay2 = $data2;

// Setup the graph
$graph = new Graph(1440,750);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
//$graph->title->Set('Filled Y-grid');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
//$graph->xaxis->HideLabels(true)
//$graph->xaxis->HideTicks(true, false);
//$graph->xaxis->SetTickLabels();
//$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('K12');

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('google');

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

