<?php
if (!empty($_users)){
echo '<h1>Новые предложения дружбы</h1>';
foreach ($_users as $user){
echo '<div style = "float : left;">';
echo $this->element('userview', array("user" => $user));
echo '<div style = "float : left;margin-top : 20px;width : 130px;">';
echo $html->link('Принять','/buddies/accept/'.$user['Buddy']['id']);
echo '<br/><br/>';
echo $html->link('Отказать','/buddies/revoke/'.$user['Buddy']['id']);
echo '</div></div>';
}
}
?>
<div style = "clear: both;">
<h1>Друзья</h1>
</div>
<?php
foreach ($users as $user){
echo $this->element('userview', array("user" => $user));
}
?>