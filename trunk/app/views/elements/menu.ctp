<div id="menu">
	<ul id="tablist">
	<li><?php echo $html->link('Home', array('controller' => 'pages', 'action' => 'display','home'));?></li>
	<li><?php echo $html->link('Privat corner', array('controller' => 'users', 'action' => 'corner'));?></li>
	<li><?echo $html->link('Userlist', array('controller' => 'users', 'action' => 'listing'));?></li>
	<li><?echo $html->link('Register', array('controller' => 'users', 'action' => 'register'));?></li>	
	</ul>
</div>