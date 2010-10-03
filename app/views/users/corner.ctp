<? if (!empty($user['User']['fname'])) : ?>
<h1>
<?php 
echo $user['User']['fname'];
echo ' ';
echo $user['User']['sname'];
 echo ', ';
echo $user['User']['bdate'];
?>
</h1>
<? else : ?>
<?echo $html->link(' >>> Здесь Вы можете внести Фамилию Имя и День рождения', '/users/edit');?>
<? endif?>


<h2><?php echo $user['User']['name']; ?> <?echo $html->link('10 баллов','/invitations/index');?></h2>
<span class="geo_datum">
Links to your personal page  :
<?php echo (
$html->link($html->url(array('controller' => $user['User']['name']), true)
)
);?>
</span>
<br/><br/>
<span class="label_corner">purpose : </span>
<? if (empty($user['Profile']['purpose'])) : ?>
<? echo $html->link('изменить ...', '/profiles/edit');?>
<? else : ?>
<?=$user['Profile']['purpose']?>
<? endif?>
<br/>


<span class="label_corner">family : </span>
<? if (empty($user['Profile']['family'])) : ?>
<? echo $html->link('изменить ...', '/profiles/edit');?>
<? else : ?>
<?=$family_options[$user['Profile']['family']]?>
<? endif?>
<br/>


<span class="label_corner">children : </span>
<? if (empty($user['Profile']['children'])) : ?>
<? echo $html->link('изменить ...', '/profiles/edit');?>
<? else : ?>
<?=$children_options[$user['Profile']['children']]?>
<? endif?>
<br/>

<? if (!empty($user['Profile']['height'])) : ?>
<span class="label_corner">height : </span><?=$height_options[$user['Profile']['height']]?>
<br/>
<? endif?>
<span class="label_corner">Skype  : </span><?=$user['Profile']['skype']?><br/>
<span class="label_corner">about me : </span><?=$user['Profile']['title']?>

<h2>locations</h2>
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

<h2>educations</h2>

<?php if (!empty($educations['unis'])): ?>
<h3>unis</h3>
<div style ="clear: both;">
<?php foreach ($educations['unis'] as $uni): ?>
<?php echo $uni['Uni']['City']['name']; ?> ::
<?php echo $html->link($uni['Uni']['name'],'/unis/view/'.$uni['Uni']['id']);?>(
<?php echo $html->link($uni['Uni']['shortname'],'/unis/view/'.$uni['Uni']['id']);?>)<br/>
<?php echo $uni['Department']['name'];?><span class="geo_datum">
 [<?php echo $uni['Education']['year_an']; ?> - 
<?php echo $uni['Education']['year_end']; ?>]
</span>
<?php echo '<br><br>'; ?>
<?php endforeach; ?>
</div>
<?php endif; ?>


<?php if (!empty($educations['school'])): ?>
<h3>schools</h3>
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
<br/>
<?=$html->image('plus.png');?> 
<? echo $html->link('Invite friends by email','/invitations/add'); ?>
<br/><br/>