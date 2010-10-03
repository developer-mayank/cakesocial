Dear <?=$name?> !
<br/><br/>
<?=$fistname?> 	
invites you to register for a new site
<br/><br/>
 	
to register please click on the link
<br/><br/>
<?php echo $html->link(($html->url(array('controller' => 'users', 'action' => 'register'), true)).'/'.$username)?>
<br/><br/>
	
Note from  <?=$fistname?>:<br/> 
-------------------------------------------------------------------
<br/>
<?php echo $text;?>
<br/>
-------------------------------------------------------------------
<br/><br/>
	
Membership is free and lasts less than a minute
-----------
<br/><br/>