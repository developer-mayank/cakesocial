Dear <?=$name?>,

You have made a request for a password on the site studip.org <br/>
for security, all passwords are stored in encrypted form, <br/>
so we can not tell you your old password, <br/>
so if you want to generate a new password, visit the following link:
<br/><br/>
<? echo     $html->link(
$html->url(array('controller' => 'users', 'action' => 'reset_pwd',$activation_code), true),
$html->url(array('controller' => 'users', 'action' => 'reset_pwd',$activation_code), true));
?>
<br/>	
Best regards,