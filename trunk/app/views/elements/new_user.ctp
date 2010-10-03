<?
$users = ClassRegistry::init('User')->get_latest(4);
echo '<div style = "padding: 0 60px;margin-top:10px;">';
echo 'new user:';
foreach ($users as $user)
{
	echo $this->element('userview', array("user" => $user['User']));//,'cache'=>'1 day'
}
echo '</div>';