<?php if ($entity['img'] != null): ?>
<?=$html->image('geos/big/'.$entity['img'],array('title'=> $entity['name'],'alt' => $entity['name'])); ?>
<?php else: ?>
<?=$html->image('geos/netfotogroup.jpg',array('title'=> $entity['name'],'alt' => $entity['name']))?>
<?php endif ?>

<?
switch($entity['entity_type'])
{
	case '6': $menu = 'cities'; break;
	case '7': $menu = 'regions'; break;
	case '8': $menu = 'countries'; break;
}
?>

<? $options = $jaxoption->make('div_msg');?>

 <div id="usermenu">
	    <ul>
	    <? if ($session->check('Auth.User')): ?>
	    <li><?echo $html->link('Location '.$entity['name'],'/'.$menu.'/view/'.$entity['id']);?></li>
	    <li><?echo $ajax->link('+Join', '/geos/add/'.$entity['id'],$options);?></li>
	     <li><?echo $html->link('Photo Albums', '/albums/index/0/'.$entity['entity_type'].'/'.$entity['id']);?></li>
	    <?php else: ?>
	    <li><?echo $html->link('+Join', '/users/register/'.$entity['id']);?></li>      	
	    <li><?echo $html->link('Photo Albums', '/users/register/');?></li>
	    <?php endif ?>
	    </ul>
</div>