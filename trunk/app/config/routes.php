<?php
    Router::connect('/posts', array('controller' =>'posts'));
	Router::connect('/buddies', array('controller' =>'buddies'));
	Router::connect('/albums', array('controller' =>'albums'));
	Router::connect('/sitemap.xml', array('controller' => 'sitemaps', 'action' => 'sitemap'));
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/:username', array('controller' =>'users', 'action'=> 'view'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	
?>