<?php $user=$this->requestAction('users/get_foto');?>
<?php if ($user['User']['img'] != null): ?>
<?=$html->image('profiles/big/'.$user['User']['img']); ?>
<?php else: ?>
<?=$html->image('profiles/big/netfoto.png'); ?>
<?php endif ?>
<div class="usermenu">
<ul>
        <li><?echo $html->link('Мои гости', '/guests');?></li>
	    <li><?echo $html->link('Мои фото', array('controller' => 'fotos'));?></li>
        <li><?echo $html->link('Cообщества','/groups/index/'.$user['User']['id']);?></li>
</ul>
</div>