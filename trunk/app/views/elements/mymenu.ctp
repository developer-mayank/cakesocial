<?php $user=$this->requestAction('users/get_foto');?>
<?php if ($user['User']['img'] != null): ?>
<?=$html->image('profiles/big/'.$user['User']['img']); ?>
<?php else: ?>
<?=$html->image('profiles/big/netfoto.png'); ?>
<?php endif ?>
<div class="usermenu">
<ul>
        <li><?echo $html->link('Guests', '/guests');?></li>
	    <li><?echo $html->link('My Photos', array('controller' => 'fotos'));?></li>
        <li><?echo $html->link('Groups','/groups/index/'.$user['User']['id']);?></li>
</ul>
</div>