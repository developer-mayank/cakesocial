<div class="login" id="div_login">
<h2>Login</h2>    
    <?php echo $form->create('User', array('action' => 'login'));?>
        <?php echo $form->input('email');?>
        <?php echo $form->input('password');?>
        <?php echo $form->submit('Login');?>
        <?php echo $form->end();?>	
::<?echo $html->link('forgot your password', '/users/forget');?> 
<br/>
::<?echo $html->link('registration', array('controller' => 'users', 'action' => 'register'));?>
</div>