<div style="float : left;width : 100px;margin:10px;text-align:center;position:relative;">
<?php if (isset ($user['is_online']) && $user['is_online']): ?>
<?php
echo '<div style="position:absolute;left:80px; top:-4px; width:18px; height:40px;">'.
$html->image('web.gif',array('title'=>'online')).
'</div>';
?>
<?php endif ?>
<div>  
<?php if ($user['img'] != null): ?>
<?=$html->image('users/small/'.$user['img']); ?>
<?php else: ?>
<?=$html->image('users/empty/nosmall.png'); ?>
<?php endif ?>
</div>
<div>
<?
if(isset ($geo))
{
	echo '<span class="geo_datum">'.$geo['City']['name'].'</span><br/>';
}
if ($user['fname']=='')
{
	echo $html->link($user['name'],'/'.$user['name']);
}
else
{
	echo $html->link($user['fname'],'/'.$user['name']);
}




?>
</div>
</div>