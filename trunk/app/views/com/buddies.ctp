
<?php
if (!empty($_users)){
echo '<h1>New friend request</h1>';
foreach ($_users as $user){
echo '<div style = "float : left;">';
echo $this->element('userview', array("user" => $user));
echo '<div style = "float : left;margin-top : 20px;width : 130px;">';
echo $html->link('Accept','/buddies/accept/'.$user['Buddy']['id']);
echo '<br/><br/>';
echo $html->link('Refuse','/buddies/revoke/'.$user['Buddy']['id']);
echo '</div></div>';
}
}
?>
<div style = "clear: both;">
<h1>friend</h1>
</div>
<?php
foreach ($users as $user){
echo $this->element('userview', array("user" => $user));
}
?>