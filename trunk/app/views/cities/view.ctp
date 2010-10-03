<h2>Location group :: City <?=$group['City']['name']?> (<?=$group['Country']['name']?>)</h2>
<?php echo $userlist->make($group['User'],'users'); ?>
<div>
<?php echo $html->link(' ...', array('controller' => 'cities', 'action' => 'user_list',$group['City']['id']));?>
</div>