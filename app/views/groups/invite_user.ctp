<h2>	
Invite to Group</h2>
<?
if (isset ($inviteUser))
{
 e($inviteUser);
}
else
{
$options = $jaxoption->make('div_msg');
	
echo $ajax->form('inviteUser','Group',$options );
echo $form->input('GroupsUser.user_id',array('type'=>'hidden', 'value' => $user_id));
echo $form->input('GroupsUser.inviter_id',array('type'=>'hidden', 'value' => $inviter_id));
echo $form->input('GroupsUser.role_id',array('type'=>'hidden', 'value' => 1));

echo $form->input('GroupsUser.group_id',
                          array('options' => $groups,
                         $showEmpty = 'indicate the group',
                         'label' => 'Group Name')
);

echo $form->submit('Invite');
echo $form->end();
} 
?>