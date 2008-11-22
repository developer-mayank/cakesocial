<h2>Пришласить в группу</h2>
<? 
//echo $form->create('Group',array('action' => 'invite'));
$options = array(
    'update'   => 'div_studuser',
	'loading'  => '$(\'div_spinner\').style.display = \'block\';',
	'complete' => '$(\'div_spinner\').style.display = \'none\';');
echo $ajax->form('invite','Group',$options );
echo  $form->select('GroupsUser.group_id',$groups,null,array(),$showEmpty = 'укажите группу');
echo $form->input('GroupsUser.user_id',array('type'=>'hidden', 'value' => $user_id));
echo $form->submit('Пригласить');
echo $form->end(); 
?>