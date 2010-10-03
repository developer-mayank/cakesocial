<div style = "width : 190px;">
<h3 style = "margin:20px 0;">Topcities:</h3>
<?
$cities = ClassRegistry::init('City')->getForUsers();
foreach ($cities as $city)
{
	$font_size = 10 + $city[0]['c'];
	echo $html->link($city['cities']['name'],'/cities/view/'.$city['cities']['id'],
	array("title"=>"look ".$city['cities']['name'],'style' => 'font-size: '.$font_size.'px;
	text-decoration: none;'));
	echo ' ';
}
echo '</div>';