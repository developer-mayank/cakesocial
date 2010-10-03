<div style="float : left;width : 150px;margin:10px;text-align:center;">
<div style="float : left;width : 150px;margin-right :  15px;">
<?php if ($group['img'] != null): ?>
<?=$html->image('groups/small/'.$group['img']); ?>
<?php else: ?>
<?=$html->image('groups/netfotogroupsmall.jpg'); ?>
<?php endif ?>
</div>
<div>
<? 
echo $html->link($group['name'],array('controller' => 'groups','action' => 'view',$group['id']));
?>
</div>
</div>