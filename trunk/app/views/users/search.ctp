<h1>search for users</h1>
Fill only the fields you need
<?php 
echo $form->create('User', array('action' => 'search'));

if (isset ($geo_ids))
{
	echo $this->Element('geo',array('geo_ids' => $geo_ids));
}
else
{
	echo $this->Element('geo');
}


echo $form->input('name',array('label'=>'name [0+ chars]'));
echo $form->input('sname',array('label'=>'family name [0+ chars]'));
echo $form->input('Profile.sex', array(
                       'options' => $sex_options,
                       'empty' => 'it does not matter',
                       'label' => 'Uni-Bremen'));
echo $form->submit('send');
echo $form->end();
?>
<? if (!empty($users)):?>
<h2>found</h2>

<?php 
foreach ($users as $user):
echo $this->element('userview', array("user" => $user['User']));
endforeach;
echo '<div style = "clear: both;">';
echo $paginator->numbers(); 
echo '</div>';
?>
<? endif ?>