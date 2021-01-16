<?php // content="text/plain; charset=utf-8"
header("refresh:1200;");
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');
$dbhost = "192.168.86.29";
$user = "postgres";
$db = "nwstatus";
$pw = "postgres";
$dbconn2 = pg_connect("host=$dbhost dbname=$db user=$user password=$pw");
//echo "got this far";
$sqlh1 = "SELECT to_char(date,'HH24:MI') as date2, date, name, temp FROM svrstatus WHERE temp >= '2' AND name = 'artemis' AND date > ( NOW() - INTERVAL '2 hour') ORDER BY date;";
//$sqlh2 = "SELECT to_char(date,'HH24:MI') as date2, date, name, temp FROM svrstatus WHERE temp >= '2' AND name = 'apollo' AND date > ( NOW() - INTERVAL '2 hour') ORDER BY date;";
$resulth1= pg_query($sqlh1);
while($row = pg_fetch_assoc($resulth1)) {
$datay1[] = $row["temp"];
$datax1[] = $row["date2"];
}
//$resulth2= pg_query($sqlh2);
//while($row = pg_fetch_assoc($resulth2)) {
//$datay2[] = $row["temp"];
//$datax2[] = $row["date2"];
//}
$datay1 = $data1;
//$datay2 = $data2;
$datax1 = $data1D;
//$datax2 = $data2D;
echo "data ";
$graph = new Graph(1000,800);
//$graph->SetScale('datlin',0,200);
$graph->SetScale("textlin");
//$graph->SetScale('intlin',0,0,$xmin,$xmax);
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
//$graph->title->Set('Filled Y-grid');
$graph->SetBox(false);
$graph->img->SetAntiAliasing();
$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->yaxis->scale->ticks->Set(50,10);
$graph->yaxis->scale->SetAutoMin(0);
$graph->yaxis->scale->SetAutoMax(200);
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
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#FF0000");
$p1->SetLegend('Artemis');
//$p2 = new LinePlot($datay2);
//$graph->Add($p2);
//$p2->SetColor("#001100");
//$p2->SetLegend('Apollo');
$graph->legend->SetFrameWeight(1);
$graph->legend->SetFont(FF_FONT2,FS_NORMAL,20);
$graph->legend->SetFillColor("#777777");
$graph->legend->SetColor('white');
// Output line
$graph->Stroke();
$conn->close();
?>
