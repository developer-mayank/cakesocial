<h2>Invite friends</h2>	
At the requested e-mail will be sent an invitation to register.
<?
echo $form->create('Invitation');
echo $form->input('inviter_id',array('type'=>'hidden', 'value' => $user_id));
echo $form->input('email',array('label'=>'E-mail'));
echo $form->input('name',array('label'=>'name'));
echo $form->input('title',array('label'=>'your message:','type'=>'textarea'));
echo $form->submit('send');
echo $form->end();
?>