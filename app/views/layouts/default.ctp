<?php echo $html->docType(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $html->charset('utf-8'); ?>
<title>
	<?php echo $title_for_layout; ?>
</title>
<?php
if (isset($keywords) && !empty($keywords)) {
    echo $html->meta( 'keywords',$keywords);
}
else
{
}
//echo $html->meta('icon');
?>
<meta name="verify-v1" content="K171UiDyBeSVfbj7VaYV/EwA+E+tnvCKZeilQXq+H7Q=" />

<? if (!$session->check('Auth.User')): ?>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-5420074-4");
pageTracker._trackPageview();
} catch(err) {}</script>


<? endif ?>




<?
echo $html->css('studip');

if(isset($javascript)):
	echo $javascript->link('prototype-1.6.0.2.js');
	echo $javascript->link('scriptaculous.js'); // ?load=effects
	echo $javascript->link('controls.js');
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

		<div id="sidebar-left">
		   <? foreach ($elements_left  as $element=>$parameters) : ?>
			<? echo $this->element($element,$parameters);?>
		  <? endforeach; ?>
		</div>
        
        <div id = "div_content">
        <?php if ($session->check('Message.flash')) $session->flash();?>
		<?php if ($session->check('Message.auth')) $session->flash('auth'); ?>
		<div id = "div_msg" style = "margin-top: 10px;text-align: center;background-color: #fff6bf;color: #993;line-height: 150%;"></div>
	        <div id = "div_userarea">
				<?php echo $content_for_layout; ?>
			</div>
		</div>
		
	    <div id="sidebar-right">
	    <? if(!empty($elements_right)): ?>
		 <? foreach ($elements_right as $element=>$parameters) : ?>
			<? echo $this->element($element,$parameters);?>
		  <? endforeach; ?>
		<? endif; ?>
	    </div>
	
	</div>
</div>

<? echo $this->element('footer');?>

<div id = "div_spinner" style="display :none;position: absolute;top : 150px;left :800px;">
		<?php echo $html->image('spinner.gif'); ?>
		<div>Loading!</div>
</div>
</body>
</html>