<div class="register">
<h1>Registration</h1>
<? echo $form->create('User',array('action' => 'register'));?>
<? echo $form->input('fname',array('label'=>'Name'));?>
<? echo $form->input('sname',array('label'=>'Familyname'));?>
<?=$form->input('name',array('label'=>'Login'));?>
<?=$form->input('password',array('label'=>'password') );?>
<?=$form->input('email',array('label'=>'E-mail'));
if (isset ($geo_ids))
{
	echo $this->Element('geo',array('geo_ids' => $geo_ids));
}
else
{
	echo $this->Element('geo');
}
echo $form->submit('Send');
echo $form->end(); 
?>
</div>

<?echo $html->link('already registered', array('controller' => 'users', 'action' => 'login'));?>  :: 
<?echo $html->link('forgot your password', '/users/forget');?> 
<br/><br/>
<span class = "info" onClick="Element.show('info')">INFO:</span>
<span id="info" class = "description" style="display:none;">
<br> * Info 1
<br> * Info 1
<br> * Info 1
</span>
<br/><br/>
