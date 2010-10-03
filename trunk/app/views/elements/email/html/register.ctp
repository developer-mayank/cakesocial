	
Hello,<br/>
	
You are receiving this message because You or someone pointed out your e-mail registration
<br/><br/>
	
WARNING!<br/>
	
Your account has not yet been activated. <br/>
For the full use of the site <br/>
you must verify your address e-mail.<br/>
<br/><br/>
	
To confirm the address, click the following link:<br/>
<? echo     $html->link(
$html->url(array('controller' => 'users', 'action' => 'activate',$activation_code), true),
$html->url(array('controller' => 'users', 'action' => 'activate',$activation_code), true));
?>
<br/><br/>