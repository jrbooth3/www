<?php // content="text/plain; charset=utf-8"
header("refresh: 60;");
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');
$dbhost = "192.168.86.29";
$user = "postgres";
$db = "nwstatus";
$pw = "postgres";
$dbconn2 = pg_connect("host=$dbhost dbname=$db user=$user password=$pw");
$sqlh = "SELECT time from db_rep WHERE prc = 'restore' and date > ( NOW() - INTERVAL '24 hour') and server = 'jupiter' order by date;";
$resulth1= pg_query($sqlh);
while($row = pg_fetch_assoc($resulth1)) {
$data1[] = $row["time"];
}
$datay1 = $data1;
// Setup the graph
$graph = new Graph(3600,2000);
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
$graph->yaxis->scale->SetAutoMin(0);
//$graph->yaxis->scale->SetAutoMax(60);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
//$graph->xaxis->HideLabels(true)
//$graph->xaxis->HideTicks(true, false);
//$graph->xaxis->SetTickLabels();
//$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#000000");
$p1->SetLegend('Jupiter');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();
$conn->close();
?>

