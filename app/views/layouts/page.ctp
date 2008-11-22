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

<div id="content">


        
		<div id = "div_spinner" style="display :none;position: absolute;top : 150px;left :700px;">
		<?php echo $html->image('spinner.gif'); ?>
		<div>Идет загрузка новых данных!</div>
		</div>

		<?php if ($session->check('Message.flash')) $session->flash();?>
		<?php if ($session->check('Message.auth')) $session->flash('auth'); ?>
		
		<?php echo $content_for_layout; ?>

	
</div>
</div>

<div id="footer"></div>

<?php echo $cakeDebug; ?>

</body>
</html>
