<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset('utf-8'); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');
		echo $html->css('menu');
		if(isset($javascript)):
		    echo $javascript->link('prototype-1.6.0.2.js','scriptaculous.js?load=effects','calendar.js');
		endif;
?> 
</head>
<body>
<?php 
echo $this->element('logo'); 
?>

<div id="container">
<?php 
echo $this->element('menu'); 
?>
<div id="content" >
<div style="float : left;width : 200px;margin-right :  20px;">

<?php 
echo $this->element('login'); 
?>

 
	</div>
		<div style="float : left;">
			<?php if ($session->check('Message.flash')) $session->flash();?>
			<? if ($session->check('Message.auth')) $session->flash('auth'); ?>
			<?php echo $content_for_layout; ?>
		</div>
		
</div>
</div>


	
<div id="footer">
<?php 
echo $html->link(
$html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework", true), 'border'=>"0")),
'http://www.cakephp.org/',
array('target'=>'_new'), null, false);
?>
</div>

<?php echo $cakeDebug; ?>

</body>
</html>
