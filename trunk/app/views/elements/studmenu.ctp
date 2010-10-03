<?php if ($entity['img'] != null): ?>
<?=$html->image('users/big/'.$entity['img'],
array('width' => 200 ,'alt' => $entity['name'].' '.$entity['sname'].' '.$entity['fname'].' '.$entity['bdate'],
'title' => $entity['name'].' '.$entity['sname'].' '.$entity['fname'].' '.$entity['bdate']
)); ?>
<?php else: ?>
<?=$html->image('users/empty/netfoto.png'); ?>
<?php endif ?>

<? if ($entity['is_online']) : ?>
<span class="geo_datum">online</span>
<? else: ?>
<span class="geo_datum">was online : <?=$time->niceShort($entity['updated'])?></span>
<? endif ?>


<? $options = $jaxoption->make('div_userarea');?>
<? $options_msg = $jaxoption->make('div_msg');?>
<div class="usermenu">
	    <ul>
	    <li><?echo $html->link($entity['name'].'\'s ', '/users/view/'.$entity['id']);?></li>
	    <li><?echo $html->link('Groups', '/groups/main/'.$entity['id']);?></li>
	    <li><?echo $html->link('buddies', '/buddies/main/'.$entity['id']);?></li>
	    <li><?
	    // echo $html->link('albums', '/albums/main/0/1/'.$entity['id']);
	    ?></li>
	    <? if ($session->check('Auth.User')): ?>
	    <li><?echo $ajax->link('Add to buddies', '/buddies/add/'.$entity['id'],$options_msg);?></li>
	    <li><?echo $ajax->link('Add ti favorites', '/favorites/add/'.$entity['id'],$options_msg);?></li>
        <li><?echo $ajax->link('Send message','/posts/add/'.$entity['id'],$options);?></li>
        <?php else: ?>
        <li><?echo $html->link('Add to buddies', '/users/register/');?></li>
	    <li><?echo $html->link('Add ti favorites',  '/users/register/');?></li>
        <li><?echo $html->link('Send message', '/users/register/');?></li>
	    <?php endif ?>
	    </ul>
</div>