<?
$countries = ClassRegistry::init('Country')->getForUnis();
foreach ($countries as $country)
{
	echo $html->link($country['countries']['name_en'], array('controller' => 'unis', 'action' => 'search',$country['countries']['id']));
	echo ' <span class="geo_datum">('.$country[0]['c'].')</span>';
	echo ' ';
}
echo '<br/><br/>';
if(empty($country_id))$country_id = $countries[0]['countries']['id'];

if(empty($region_id)):
$regions = ClassRegistry::init('Region')->getRegionsForUnis($country_id);
echo '<ul>';
foreach ($regions as $region)
{
	echo '<li>';
	echo $html->link($region['regions']['name'], array('controller' => 'unis',
	 'action' => 'search',$country_id,$region['regions']['id']));
	echo ' <span class="geo_datum">('.$region[0]['c'].')</span>';
	echo '</li>';
}
echo '</ul>';echo '<br>';
else:
//echo $region_id;
endif;


//debug($cities);
/*
$cities = ClassRegistry::init('City')->getForUnis($country_id);
foreach ($cities as $city)
{
	echo $html->link($city['cities']['name'], array('controller' => 'unis', 'action' => 'search',$country_id,$city['cities']['id']));
	echo ' <span class="geo_datum">('.$city[0]['c'].')</span>';
	echo ' ';
}
*/

?>
