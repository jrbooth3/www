<?php // content="text/plain; charset=utf-8"
header("refresh:1200;");
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');
$dbhost = "192.168.86.29";
$user = "postgres";
$db = "nwstatus";
$pw = "postgres";
$dbconn2 = pg_connect("host=$dbhost dbname=$db user=$user password=$pw");
$pbs = "SELECT to_char(date,'HH24:MI') as date2, date, space FROM space WHERE server = 'artemis' and vol = 'pbs' and date > ( NOW() - INTERVAL '1 month') ORDER BY date;";
$movies = "SELECT to_char(date,'HH24:MI') as date2, date, space FROM space WHERE vol = 'movies' and  date > ( NOW() - INTERVAL '1 month') ORDER BY date;";
$tv = "SELECT to_char(date,'HH24:MI') as date2, date, space FROM space WHERE vol = 'tv' and  date > ( NOW() - INTERVAL '1 month') ORDER BY date;";
$resultpbs= pg_query($pbs);
while($row = pg_fetch_assoc($resultpbs)) {
$datay1[] = $row["space"];
$datax1[] = $row["date2"];
}
$resultmovies= pg_query($movies);
while($row = pg_fetch_assoc($resultmovies)) {
$datay2[] = $row["space"];
$datax2[] = $row["date2"];
}
$resulttv= pg_query($tv);
while($row = pg_fetch_assoc($resulttv)) {
$datay3[] = $row["space"];
$datax3[] = $row["date2"];
}
//$datay1 = $data1;
//$datay2 = $data2;
//$datax1 = $data1D;
//$datax2 = $data2D;
$graph = new Graph(3600,2000);
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
$graph->yaxis->scale->ticks->Set(10,50);
$graph->yaxis->scale->SetAutoMin(0);
$graph->yaxis->scale->SetAutoMax(100);
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
$p1->SetLegend('PBS');
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#00FF00");
$p2->SetLegend('Movies');
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#0000FF");
$p3->SetLegend('TV');
$graph->legend->SetFrameWeight(1);
$graph->legend->SetFont(FF_FONT2,FS_NORMAL,20);
$graph->legend->SetFillColor("#777777");
$graph->legend->SetColor('white');
// Output line
$graph->Stroke();
$conn->close();
?>
