<? if (!empty($groups2confirm)) :?>
<h3>	
invite to group</h3>
<?php
foreach ($groups2confirm as $group):

echo '<div style="display: inline;float : left;">';

	
echo $this->element('userview', array("user" => $group['GroupsUser']['User']));
echo '</div>';

echo '<div style="display: inline;float : left;margin-top:30px;">';
echo 'invite to group<br>';
echo $html->link('confirm','/groups_users/confirm/'.$group['GroupsUser']['group_id']);
echo '  ';
echo $html->link('denny','/groups_users/denny/'.$group['GroupsUser']['group_id']);
echo '</div>';
echo '<div style="display: inline;float : left;">';
echo $this->element('groupview', array("group" => $group['Group']));

echo '</div>';


endforeach;
?>
<? endif ?>

<div style="display: block;clear: both;">
<h2>Groups </h2></div>
<?
echo $html->link('creat new ...', array('controller' => 'groups', 'action' => 'add'));
?>
 :: 
<?
echo $html->link('search', array('controller' => 'groups', 'action' => 'search'));
?>

<?php 
if (!empty($groups)):
foreach ($groups as $group):
echo $this->element('groupview', array("group" => $group['Group']));
endforeach;
endif;
?>
</div>

