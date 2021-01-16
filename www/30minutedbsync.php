<?php // content="text/plain; charset=utf-8"
header("refresh: 15;");
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');
$dbhost = "192.168.86.29";
$user = "postgres";
$db = "nwstatus";
$pw = "postgres";
$dbconn2 = pg_connect("host=$dbhost dbname=$db user=$user password=$pw");
$sqlh4 = "SELECT time from db_rep WHERE date > ( NOW() - INTERVAL '30 minute') and server = 'venus' order by date;";
$sqlh3 = "SELECT time from db_rep WHERE date > ( NOW() - INTERVAL '30 minute') and server = 'Saturn' order by date;";
$sqlh2 = "SELECT time from db_rep WHERE date > ( NOW() - INTERVAL '30 minute') and server = 'jupiter' order by date;";
//$sqlh1 = "SELECT time from db_rep WHERE date > ( NOW() - INTERVAL '30 minute') and server = 'neptune' order by date;";
$resulth4= pg_query($sqlh4);
while($row = pg_fetch_assoc($resulth4)) {
$data4[] = $row["time"];
}
$resulth3= pg_query($sqlh3);
while($row = pg_fetch_assoc($resulth3)) {
$data3[] = $row["time"];
}
$resulth2= pg_query($sqlh2);
while($row = pg_fetch_assoc($resulth2)) {
$data2[] = $row["time"];
}
/*$resulth1= pg_query($sqlh1);
while($row = pg_fetch_assoc($resulth1)) {
$data1[] = $row["time"];
}
*/
//$datay1 = $data1;
$datay2 = $data2;
$datay3 = $data3;
$datay4 = $data4;
// Setup the graph
$graph = new Graph(1920,1080);
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
/*
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#00FF00");
$p1->SetLegend('neptune ');
*/
// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#FF0000");
$p2->SetLegend('jupiter');

$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#000000");
$p3->SetLegend('saturn');

$p4 = new LinePlot($datay4);
$graph->Add($p4);
$p4->SetColor("#00ff00");
$p4->SetLegend('venus');

$graph->legend->SetFrameWeight(1);
$graph->legend->SetFont(FF_FONT2,FS_NORMAL,20);
$graph->legend->SetFillColor("#777777");
$graph->legend->SetColor('white');

// Output line
$graph->Stroke();
$conn->close();
?>

