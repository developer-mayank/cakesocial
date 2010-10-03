<div>
<h2>login</h2>    
    <?php echo $form->create('User', array('action' => 'login'));?>
        <?php echo $form->input('email');?>
        <?php echo $form->input('password');?>
        <?php echo $form->submit('login');?>
</div>
<?echo $html->link('forget', '/users/forget');?>  ::  
<?echo $html->link('register', array('controller' => 'users', 'action' => 'register'));?>
<br/><br/>