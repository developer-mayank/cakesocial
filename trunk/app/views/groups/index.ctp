<h2>Cообщества/Группы в которых я участвую </h2>
<?
echo $html->link('Создать новую группу', array('controller' => 'groups', 'action' => 'add'));
?>
<br/><br/>
<?php foreach ($groups as $group): ?> 
<?php 
echo $html->link($group['Group']['name'],"/groups/edit/{$group['Group']['id']}")?>
<br/>
<br/>
<?php endforeach; ?>