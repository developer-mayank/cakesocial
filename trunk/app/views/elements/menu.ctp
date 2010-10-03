<div id="menu">
	<ul id="tablist">
	<li><?php echo $html->link('Home', array('controller' => 'pages', 'action' => 'display','home','admin' => false));?></li>
	<li><?php echo $html->link('Privat Corner', array('controller' => 'users', 'action' => 'corner','admin' => false));?></li>
	<li><?echo $html->link('Users', array('controller' => 'users', 'action' => 'show','admin' => false));?></li>
	<li><?echo $html->link('Groups', array('controller' => 'groups', 'action' => 'search','admin' => false));?></li>
	<? if (!$session->check('Auth.User')): ?>	
	<li><?echo $html->link('Registration', array('controller' => 'users', 'action' => 'register','admin' => false));?></li>
	<? endif ?>	
	</ul>
</div>