<?
$i = 0;
foreach ($maps as $map)
{
$points[$i]['Point']['longitude'] = $map['longitude'];
$points[$i]['Point']['latitude']  = $map['latitude'];
$i++;
}
$key = "ABQIAAAAGZBW7gt42T-mBJ95FIPGwRSntjUbqNgGmjzPhe4keAHyUrmfnRTqZp0XQZE_z4Kc1585VnllROhUOQ";
$url = "http://maps.google.com/maps?file=api&v=2&key=$key";
echo $javascript->link($url);
if (!empty($points))
{
   $default = array('type'=>'0','zoom'=>5,'lat'=>$points[0]['Point']['latitude'],'long'=>$points[0]['Point']['longitude']);
}
else
{
	$default = array('type'=>'0','zoom'=>4,'lat'=>51.1162,'long'=>8.8069);
}
echo $googleMap->map($default, $style = 'width:200px; height: 350px' );
echo $googleMap->addMarkers($points);
?>