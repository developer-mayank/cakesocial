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
echo $html->meta( 'description','enter any meta description here',array(), false );
//echo $html->meta('icon');
?>

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
        
        <div id = "div_content" style = "width : 760px;">
        <?php if ($session->check('Message.flash')) $session->flash();?>
		<?php if ($session->check('Message.auth')) $session->flash('auth'); ?>
		<div id = "div_msg" style = "margin-top: 10px;text-align: center;background-color: #fff6bf;color: #993;line-height: 150%;"></div>
	        <div id = "div_userarea">
				<?php echo $content_for_layout; ?>
			</div>
		</div>
	
	</div>
</div>

<? echo $this->element('footer');?>

<div id = "div_spinner" style="display :none;position: absolute;top : 150px;left :800px;">
		<?php echo $html->image('spinner.gif'); ?>
		<div>load!</div>
</div>
</body>
</html>