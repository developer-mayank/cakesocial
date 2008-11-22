<h2>Кто смотрел мою страницу </h2>

<?php 
foreach ($users as $user): 
echo '<div style="float : left;width : 150px;margin-right :  10px;">';
if ($user['User']['img'] != null): 
echo $html->image('profiles/small/'.$user['User']['img']);
endif;
echo '<br/>';
echo $html->link($user['User']['username'],array('controller' => 'users', 'action' => 'view',$user['User']['id']));
echo '<div>';
endforeach;
?>