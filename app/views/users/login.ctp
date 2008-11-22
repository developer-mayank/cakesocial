<div>
<h2>Login</h2>    
    <?php echo $form->create('User', array('action' => 'login'));?>
        <?php echo $form->input('username');?>
        <?php echo $form->input('password');?>
        <?php echo $form->submit('Login');?>
</div>