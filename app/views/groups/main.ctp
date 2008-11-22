<h2>Cообщества/Группы</h2>
<?
$options = array(
    'update'   => 'div_studuser',
	'loading'  => '$(\'div_spinner\').style.display = \'block\';',
	'complete' => '$(\'div_spinner\').style.display = \'none\';');
echo  $ajax->link('Пригласить в группу','/groups/invite/'.$user_id,$options);
?>
<br/>
<?php foreach ($his_groups as $group): ?>
<?php echo $group['Group']['name']; ?> - 
<br/>
<?php endforeach; ?>
<br/>
<?php foreach ($groups as $group): ?>
<?php echo $group['Group']['name']; ?> - 
<br/>
<?php endforeach; ?>