<? if (!empty($user)) : ?>
<h1>
<?php 
echo $user['User']['name']; 
echo ' :: ';
echo $user['User']['fname'];
echo ' ';
echo $user['User']['sname'];
echo ' :: <span class="geo_datum">';
echo $user['User']['bdate'];
echo '</span>';
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



about me  : <?=$user['Profile']['title']?><br/><br/>
Skype  : <?=$user['Profile']['skype']?><br/>

<h2>Locations</h2>
<? foreach ($user['Geo']  as $geo): ?>

<?echo $html->link($geo['Country']['name_en'],'/countries/view/'.$geo['country_id']);?> 
 	::
<?echo $html->link($geo['Region']['name'],'/regions/view/'.$geo['region_id']);?> 
 	::
<?echo $html->link($geo['City']['name'],'/cities/view/'.$geo['city_id']);?> 
 	<span class="geo_datum">[<?=$geo['date_an']?>/
 	<?=$geo['date_end']?>]</span>
 	<br/><br/>
<? endforeach; ?>

<?php if (!empty($educations['unis'])): ?>
<h3>Unis</h3>
<div style ="clear: both;">
<?php foreach ($educations['unis'] as $uni): ?>

<?php echo $html->link($uni['Uni']['name'],'/unis/view/'.$uni['Uni']['id']);?>
<br/>
(<?php echo $uni['Uni']['City']['name']; ?> ::
<?php echo $html->link($uni['Uni']['shortname'],'/unis/view/'.$uni['Uni']['id']);?>)
<?php echo $uni['Department']['name'];?><span class="geo_datum">
 [<?php echo $uni['Education']['year_an']; ?> - 
<?php echo $uni['Education']['year_end']; ?>]
</span>
<?php echo '<br><br>'; ?>
<?php endforeach; ?>
</div>
<?php endif; ?>


<?php if (!empty($educations['school'])): ?>
<h3>Schools</h3>
<div style ="clear: both;">
<?php foreach ($educations['school'] as $school): ?>
<?php echo $school['School']['City']['name']; ?> ::
<?php echo $html->link($school['School']['name'],'/schools/view/'.$school['School']['id']);?>

<span class="geo_datum">
[<?php echo $school['Education']['year_an']; ?> - 
<?php echo $school['Education']['year_end']; ?>]</span>
<br/><br/>
<?php endforeach; ?>
</div>
<?php endif; ?>

<? else: ?>
You can not be found
<? endif?>