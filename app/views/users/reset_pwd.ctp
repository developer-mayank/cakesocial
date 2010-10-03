<h2>	
Retrieve password. Step 2.</h2>
<div>
<?php 
echo $form->create('User', array('action' => 'reset_pwd'));
echo $form->input('token',array('type'=>'hidden', 'value' => $token));
echo $form->input('password',array('label'=>'	
New Password'));
echo $form->submit('send');
echo $form->end();
?>
</div>