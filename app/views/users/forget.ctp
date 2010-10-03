<div>
<?php echo $form->create('User', array('action' => 'forget'));?>
<h3>	
Restoring forgotten or creating a new password</h3>
<?php
	echo $form->input('email', array('label' => '	
Enter your Email'));
?>
<?php echo $form->end('send');?>
</div>
:: <?echo $html->link('register', array('controller' => 'users', 'action' => 'register'));?>
<br/><br/>