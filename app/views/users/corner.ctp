<? if (!empty($user['User']['name'])) : ?>
<h1>
<?php 
echo $user['User']['name'];
?>
</h1>
<? else : ?>
<?echo $html->link(' >>> edit', '/users/edit');?>
<? endif?>

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
<? echo $html->link('edit ...', '/profiles/edit');?>
<? else : ?>
<?=$user['Profile']['purpose']?>
<? endif?>
<br/>


<span class="label_corner">family : </span>
<? if (empty($user['Profile']['family'])) : ?>
<? echo $html->link('edit ...', '/profiles/edit');?>
<? else : ?>
<?=$family_options[$user['Profile']['family']]?>
<? endif?>
<br/>


<span class="label_corner">children : </span>
<? if (empty($user['Profile']['children'])) : ?>
<? echo $html->link('edit ...', '/profiles/edit');?>
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


</div>

<br/>
<?=$html->image('plus.png');?> 
<? echo $html->link('Invite friends by email','/invitations/add'); ?>
<br/><br/>