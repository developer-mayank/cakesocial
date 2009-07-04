<?php echo $html->docType(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(''); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	
echo $html->meta( 'keywords',
                  'enter any meta keyword here',
                  array(), false );
   //Output <meta name="keywords" content="enter any meta keyword here"/>
echo $html->meta( 'description',
                  'enter any meta description here',
                  array(), false );
  //Output <meta name="description" content="enter any meta description here"/>
	
	
		echo $html->meta('icon');
		echo $html->css('menu');
		//echo $scripts_for_layout;
		if(isset($javascript)):
		    echo $javascript->link('prototype-1.6.0.2.js','scriptaculous.js?load=effects');
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

<div style="float : left;width : 220px;margin-right :  20px;">
<? if ($session->check('Auth.User')): ?>
<? echo $this->element('mymenu');?>
<? else: ?>
<? echo $this->element('login');?>
<? endif ?>
</div>

        <div style="float : left;">
        
		<div id = "div_spinner" style="display :none;position: absolute;top : 150px;left :700px;">
		<?php echo $html->image('spinner.gif'); ?>
		<div>pleace wait…!</div>
		</div>

		<?php if ($session->check('Message.flash')) $session->flash();?>
		<?php if ($session->check('Message.auth')) $session->flash('auth'); ?>
			<div style="float : left;" id = "div_userarea">
				<?php echo $content_for_layout; ?>
			</div>
		</div>
	
</div>
</div>

<div id="footer">
<?php 
echo $this->element('footer'); 
?>
</div>

<?php echo $cakeDebug; ?>

</body>
</html>
