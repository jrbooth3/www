<?php
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#00FF00");
$p1->SetLegend('neptune ');

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
$p4->SetColor("#FFFF00");
$p4->SetLegend('venus');
?>
