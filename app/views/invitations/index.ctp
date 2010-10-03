<H1>invitations</h1>
<?=$html->image('plus.png');?> 
<? echo $html->link('	
Invite friends by email','/invitations/add'); ?>
<br/><br/>
Sign-Up URL :
<?php echo (
$html->link(
$html->url(array('controller' => 'users', 'action' => 'register',$name), true)
)
);?>

<div style = "clear: both;">
<? if (!empty($downlines)) : ?>
<h2>	
According to your recommendation to register</h2>

<? foreach ($downlines as $downline): ?>
<?  echo $this->element('userview', array("user" => $downline['User']));?>
<? endforeach ?>
<? endif ?>
</div>
<div style = "clear: both;">
<? if (!empty($reffers)) : ?>
<h2>	
You have already sent invitations to </h2>

<? foreach ($reffers as $reffer): ?>
<?=$reffer['Invitation']['email']?> :: 
<? endforeach ?>
<? endif ?>
</div>
<br><br>