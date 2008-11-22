<div id="logo">
<div style="float : left;">
	<li><?php echo $html->link('CakeSocial',
	 array('controller' => 'pages', 'action' => 'display','home'));

	 ?></li>

</div>
<div style="float : right;">

 <div id="info">
 	<? if ($session->check('Auth.User')): ?>
 		<? $user_id = $session->read('Auth.User.id'); ?>
		<? $user_name =$session->read('Auth.User.username'); ?>
       Logged in as <?php echo $html->link($user_name, "/users/corner/$user_id"); ?>,  
       <?php echo $html->link('Log out', '/users/logout', array('id' => 'logout')); 
       // if(isset($Auth)){ 
       ?>
	<? endif ?>
     
</div>  
    
</div>
</div>