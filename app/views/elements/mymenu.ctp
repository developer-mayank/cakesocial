<div id="droppable">
<?php if ($Auth['User']['img'] != null): ?>
<?=$html->image('users/big/'.$Auth['User']['img'],
array('width' => 200 ,'alt' => $Auth['User']['name'].' '.$Auth['User']['sname']   )); ?>
<?php else: ?>
<? e($html->image('users/netfoto.png')); ?>
<?php endif ?>
</div>

<? 
 echo $ajax->dropRemote('droppable',
 null,
 array('url' => '/fotos/get/',
 'with'=>'{id:element.id}','update'=>'droppable'));
?>
<div class="usermenu">
<ul>
        <li><?echo $html->link('Post','/posts');?> 
        <? if (isset($new_post_count) && $new_post_count ) : ?>
        new:<b><?=$new_post_count?></b>
        <? endif ?>
        </li>
        <li><?echo $html->link('invitations','/invitations/index');?></li>
        <li><?echo $html->link('my group','/groups/index');?></li>
        <li><?echo $html->link('buddylist','/buddies/main');?></li>
        <li><?echo $html->link('favorites','/favorites/index');?></li>
        <li><?echo $html->link('edit', '/users/edit');?></li>
        <li><?echo $html->link('profile', '/profiles/edit');?></li>
	    <li><?echo $html->link('my location','/geos/index/');?></li> 
        <li><?echo $html->link('educations','/educations/index');?></li>
        <li><?echo $html->link('albums', '/albums/index');?></li>
        <li><?echo $html->link('guests', '/guests/index');?></li>
        <li><?echo $html->link('search', array('controller' => 'users', 'action' => 'search'));?></li>
</ul>
</div>