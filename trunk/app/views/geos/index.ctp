<h2> (Location)</h2>


<?
echo($html->link($html->image('plus.png'),array('controller' => 'geos', 'action' => 'addUni'),
array('escape' => false))); 
echo $html->link('add new', array('controller' => 'geos', 'action' => 'add'));
?>
<br/>
<br/>
<? $i = 0; ?>
<?php foreach ($geos as $geo): ?>
<?echo $html->link($geo['Country']['name_en'],'/countries/view/'.$geo['Geo']['country_id'],array("title"=>"посмотреть группу ".$geo['Country']['name']));?>  ::
<?echo $html->link($geo['Region']['name'],'/regions/view/'.$geo['Geo']['region_id'],array("title"=>"посмотреть группу ".$geo['Region']['name']));?>  :: 
<?echo $html->link($geo['City']['name'],'/cities/view/'.$geo['Geo']['city_id'],array("title"=>"посмотреть группу ".$geo['City']['name']));?> 
<span class="geo_datum"> [<?php echo $geo['Geo']['date_an']; ?> -
<?php echo $geo['Geo']['date_end']; ?>]</span><br/>
<?php
if ($geo['Geo']['type'] == 1)
{
 	echo '<b>main</b> ';
 	echo $html->link('edit',"/geos/edit/{$geo['Geo']['id']}",array("class"=>"edit"));
}
else
{
	echo $html->link('make main',"/geos/index/main:{$geo['Geo']['id']}",array("class"=>"edit"));
	echo $html->link('edit',"/geos/edit/{$geo['Geo']['id']}",array("class"=>"edit"));
	echo $html->link('delete',"/geos/delete/{$geo['Geo']['id']}",array("class"=>"edit"),
    '?');

}
?>
<br/>
<br/>

<?
if (!empty($geo['CitiesMap']['latitude'])):
$points[$i]['Point']['longitude'] = $geo['CitiesMap']['longitude'];
$points[$i]['Point']['latitude']  = $geo['CitiesMap']['latitude'];
//$points[$i]['Point']['html'] = "Hallo"; 
$i++;
endif;
?>

<?php endforeach; ?>

<h2>Google MAP</h2>
<?php 
$key = "ABQIAAAAGZBW7gt42T-mBJ95FIPGwRSntjUbqNgGmjzPhe4keAHyUrmfnRTqZp0XQZE_z4Kc1585VnllROhUOQ";
$url = "http://maps.google.com/maps?file=api&v=2&key=$key";
echo $javascript->link($url); 
?>



<div style="float:left;width:80%;">
<?php
if (!empty($points))
{
   $default = array('type'=>'0','zoom'=>4,'lat'=>$points[0]['Point']['latitude'],'long'=>$points[0]['Point']['longitude']);
}
else
{
	$default = array('type'=>'0','zoom'=>5,'lat'=>51.1162,'long'=>8.8069);
}

echo $googleMap->map($default, $style = 'width:540px; height: 300px' );
echo $googleMap->addMarkers($points);
?>
</div>
<div>
<br/><br/><br/>
</div>