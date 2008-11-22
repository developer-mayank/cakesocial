<div style="float : left;width : 500px;">
<div style="float : left;width : 100px;margin-right :  15px;">
<?php if ($user['User']['img'] != null): ?>
<?=$html->image('profiles/small/'.$user['User']['img']); ?>
<?php else: ?>
<?=$html->image('profiles/small/netfoto.png'); ?>
<?php endif ?>
</div>

<div style="float : left;width : 80px;margin-right :  15px;">
<? echo $html->link($user['User']['username'],array('controller' => 'users','action' => 'view',$user['User']['id']));?>
<?php echo $user['User']['name']; ?>
</div>

</div>