<h2>Group : <?=$group['Uni']['name']?></h2>
<h3><?=$group['Uni']['shortname']?> :: <?=$group['City']['name']?></h3>
<?php echo $userlist->make($group['User'],'users'); ?>