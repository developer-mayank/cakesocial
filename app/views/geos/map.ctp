<h2>MAP</h2>
<?php 
$key = "ABQIAAAAGZBW7gt42T-mBJ95FIPGwRRf1w3zx_U1SaJa2Pc9-EDJs1XMXBSLcDIqH8v1wOxCW1sKGSuNaAubwg";
$url = "http://maps.google.com/maps?file=api&v=2&key=$key";
echo $javascript->link($url); 
?>



<div style="float:left;width:80%;">
<?php
$avg_lat = 51.1162;
$avg_lon = 8.8069;

$default = array('type'=>'0','zoom'=>13,'lat'=>$avg_lat,'long'=>$avg_lon);
echo $googleMap->map($default, $style = 'width:200px; height: 300px' );
//echo $googleMap->addMarkers($points);
?>
</div>
<style>
tr:hover {
    cursor: pointer;
    background: #904428;
    }
</style>