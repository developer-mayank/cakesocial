<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset('utf-8'); ?>

	<title>
		<?php echo $title_for_layout; ?>
	</title>
<?php
		echo $html->css('studip');
		
		if(isset($javascript)):
		    echo $javascript->link('prototype-1.6.0.2.js');
		    echo $javascript->link('scriptaculous.js?load=effects');
		    echo $javascript->link('controls.js');
		endif;
?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-5420074-4");
pageTracker._trackPageview();
} catch(err) {}</script>
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
		<div>Loading!</div>
		</div>

		<?php if ($session->check('Message.flash')) $session->flash();?>
		<?php if ($session->check('Message.auth')) $session->flash('auth'); ?>
		
		<?php echo $content_for_layout; ?>

	
</div>
</div>

<? echo $this->element('footer');?>

<?php echo $cakeDebug; ?>

</body>
</html>
