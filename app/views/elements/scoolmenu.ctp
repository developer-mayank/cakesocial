<?php if ($entity['img'] != null): ?>
<?=$html->image('schools/big/'.$entity['Group']['img'],array('title'=> $entity['name'],'alt' => $entity['name'])); ?>
<?php else: ?>
<?=$html->image('schools/netfoto.jpg',array('title'=> $entity['name'],'alt' => $entity['name']))?>
<?php endif ?>
<? $options = $jaxoption->make('div_userarea');?>
<? $options_msg = $jaxoption->make('div_msg');?>

<div class="usermenu">
	    <ul>
	    <? if ($session->check('Auth.User')): ?>
	    <li><?echo $ajax->link('+Join', '/educations/addUser/'.$entity['id'].'/3',$options);?></li>
	    <li><?echo $html->link('albums', '/albums/index/0/4/'.$entity['id']);?></li>
	    <?php else: ?>
	    <li><?echo $html->link('+Join', '/users/register/'.$entity['id']);?></li>
	    <li><?echo $html->link('albums', '/users/register/'.$entity['id']);?></li>
	    <li><?php endif ?>
	    </ul>
</div>