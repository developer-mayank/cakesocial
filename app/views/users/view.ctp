<? if (!empty($user)) : ?>
<h1>
<?php 
echo $user['User']['name'];
?>
</h1>

<? if (!empty($user['Profile']['profession'])) : ?>
profession : <?=$user['Profile']['profession']?>
<br/>
<? endif?>
<? if (!empty($user['Profile']['purpose'])) : ?>
The purpose in life  : <?=$user['Profile']['purpose']?>
<br/>
<? endif?>
<? if (!empty($user['Profile']['family'])) : ?>
Marital Status : <?=$family_options[$user['Profile']['family']]?>
<br/>
<? endif?>
<? if (!empty($user['Profile']['children'])) : ?>
children : <?=$children_options[$user['Profile']['children']]?>
<br/>
<? endif?>
<? if (!empty($user['Profile']['height'])) : ?>
height : <?=$height_options[$user['Profile']['height']]?>
<br/>
<? endif?>

about me  : <?=$user['Profile']['title']?><br/>
skype  : <?=$user['Profile']['skype']?><br/>

Locations:
<? foreach ($user['Geo']  as $geo): ?>
	<?echo $html->link($geo['Country']['name_en'],'/countries/view/'.$geo['country_id']);?>,
	<?echo $html->link($geo['Region']['name'],'/regions/view/'.$geo['region_id']);?> ,
	<?echo $html->link($geo['City']['name'],'/cities/view/'.$geo['city_id']);?> 
<? endforeach; ?>

<? else: ?>
You can not be found
<? endif?>