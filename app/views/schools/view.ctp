<h1>Группа : <?=$group['School']['name']?></h1>
<h2><?=$group['City']['Country']['name']?> ::
<?=$group['City']['Region']['name']?> :: <?=$group['City']['name']?></h2>

<?php echo $userlist->make($group['User'],'Users'); ?>
