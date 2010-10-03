<div id="logo">
<div style="float : left;">
     <?php   echo $html->image('sn.png',array(
     'alt' => 'alt',
     'title' => 'ertretretretetet'
     )); ?>
</div>
<div style="float : right;">
 	<? if ($session->check('Auth.User')): ?>
 		<? $user_id = $session->read('Auth.User.id'); ?>
		<? $user_name =$session->read('Auth.User.username'); ?> 
       <?php echo $html->link('Logout', '/users/logout', array('id' => 'logout'));?>
	<? endif ?>  
</div>
</div>