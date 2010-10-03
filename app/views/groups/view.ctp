<? if (!empty($group)) : ?>
<h2>Groupname "<?=$group['Group']['name']?>"</h2>
purpose : <?=$group['Group']['purpose']?>
<br/><br/>
title : <?=$group['Group']['title']?>
<?php echo $userlist->make($group['User'],'users'); ?>
<? else: ?>

<? endif?>